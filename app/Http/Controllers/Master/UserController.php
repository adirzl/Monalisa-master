<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $data = User::fetch($request);
        $fieldOnGrid = User::getFieldOnGrid();
        return view('master.user.default', compact('data','fieldOnGrid'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data = new Page;
        $parent = to_dropdown(Page::where('visible',true)->get(),'id','label');
        return view('master.page.form', compact('data', 'parent'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $values = $request->except('_token', 'save');
        $result = $this->baseStore(null, new Page(), $values, 'label');
        return $this->baseRedirect($request, 'page.index',$result);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $data = User::findOrFail($id);
        return view('master.page.show', compact('data'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        $parent = to_dropdown(Page::where('visible',true)->get(),'id','label');
        return view('master.page.form', compact('data', 'parent'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $values = $request->except('_token', '_method');
        $result = $this->baseStore(Page::findOrFail($id), $values, 'label');
        return $this->baseRedirect($request, 'page.index', $result);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {
        $result = $this->baseDestroy(Page::findOrFail($id), true);
        return $this->baseRedirect($request, 'page',$result);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector
     */
    public function softdelete($id){
        $result = $this->baseStore(Page::findOrFail($id), ['deleted_at' => Carbon::now()], 'label');
        return $this->baseRedirect(new Request(), 'page', $result);
    }

    public function configuration($id){
        $data = Page::findOrFail($id);
        $listOfTables = Page::getListOfTables();
        $tables = to_dropdown($listOfTables, 'table_name','table_name');
        return view('master.page.configuration', compact('data','tables'));
    }

    public function  configurationstore(Request $request, $id){
        $paramModel = $request->only('table_name');
        $data = Page::findOrFail($id);

        if($request->create_route){
            $this->routeSetting($data);
        }

        $result = setup_modul($data, ['name' => 'Models/'.ucwords($data->uri), '--controller' => true], $request);

        $message = ['key' => 'Page', 'value' => 'tes'];
        $status = 'error';
        $response = trans('message.create_failed', $message);

        if ($result) {
            $data->Roles()->attach(1);
            $status = 'success';
            $response = trans('message.create_success', $message);
        }

        return $this->baseRedirect($request, 'page',['response' => $response, 'status' => $status]);
    }

    public function wizard($id){
        $data = Page::findOrFail($id);
        $listOfTables = Page::getListOfTables();
        $tables = to_dropdown($listOfTables, 'table_name','table_name');
        return view('master.page.wizard', compact('data','tables'));
    }

    public function wizardstore(Request $request, $id){
        $paramModel = $request->only('table_name');

        $data = Page::findOrFail($id);
        $this->routeSetting($data);
//        $this->controllerSetting($data);
        $result = $this->modelSetting($data, $paramModel);
//        $this->viewSetting($data);

        dd($result);
    }

    public function routeSetting(Page $data){
        $filePath = base_path('routes/web.php');
        $content = file($filePath);

        for($x=(count($content)-1) ; $x>=0; $x--){
            if(str_replace("\n","",$content[$x]) == '});'){
                $content[$x-1] .= "\n\tRoute::resource('/".$data->uri."', '".ucwords($data->uri)."Controller');\n\tRoute::post('/".$data->uri."/filter', '".ucwords($data->uri)."Controller@index')->name('".$data->uri.".filter'); \n\tRoute::get('".$data->uri."/{id}/delete', '".ucwords($data->uri)."Controller@softdelete')->name('".$data->uri.".delete'); \n";
                break;
            }
        }
        $allContent = implode("", $content);
        file_put_contents($filePath, $allContent);
    }

    public function controllerSetting(Page $data){
        $arguments = [
            '--resource' => true,
            'name' => ucwords($data->uri).'Controller'
        ];

        Artisan::call('make:controller', $arguments);

        // return setupController($data);
    }

    public function modelSetting(Page $data, $request){
        // return setupModel($data, ['name' => 'Models/'.ucwords($data->uri), '--controller' => true], $request);
    }

    public function viewSetting(Page $data){
        $directoryName = 'views/'.strtolower($data->uri);
        $content = [];

        File::makeDirectory(resource_path($directoryName));
        File::put(resource_path($directoryName . '/default.blade.php'), $content);
        File::put(resource_path($directoryName . '/form.blade.php'), $content);
        File::put(resource_path($directoryName . '/view.blade.php'), $content);
    }

    public function generateuserpemda(){
        $areas = Area::where('type', 2)->get();

        $saveResult = false;
        DB::transaction(function () use($areas, &$saveResult) {     
            set_time_limit(0);       
            foreach($areas as $area){
                $tempCount = User::where('username', 'PEMDA'.$area->id)->count();

                if($tempCount == 0){
                    $user = new User([
                        'id' => Uuid::uuid4(),
                        'username' => 'PEMDA'.$area->id,
                        'name' => 'Pemda'.$area->name,
                        'email' => 'pemda'.$area->id,
                        'password' => 'p@ssw0rd',
                        'kabkot_id' => $area->id,
                        'outlet_id' => '1'
                    ]);
                    $user->save();
                }
            }
            $saveResult = true;
        });
        
        return redirect(route('user.index'));
    }
}

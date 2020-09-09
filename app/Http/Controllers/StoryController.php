<?php

namespace App\Http\Controllers;

use App\Facades\PDF;
use App\Http\Requests\StoreUpdateStory;
use App\Models\Story_detail;
use Illuminate\Http\Request;
use App\Models\Story;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Ramsey\Uuid\Uuid;

class StoryController extends Controller
{
    //
	public function index(Request $request){
        $request->user_id = auth()->user()->id;
		$data = Story::fetch($request);
		$fieldOnGrid = Story::getFieldOnGrid();
		return view('story.default', compact('data','fieldOnGrid'));
    }

	public function create(){
	    $data = new Story();
		$fieldOnForm = Story::getFieldOnForm();
        $location = to_dropdown(config('options.location'),'key', 'value');
        // $second = $this->create_dropdown_second();
		\Assets::addJs('admin\story.js');
		return view('story.form', compact('data','fieldOnForm', 'location'));
    }

	public function store(StoreUpdateStory $request){
		$values = $request->except('_token', 'save', 'child', '_method');

		$values['user_id'] = auth()->user()->id;
		$values['status'] = 1;

		$child = [];
		foreach ($request->child as $item){
            $child[] = new Story_detail([
                'id' => Uuid::uuid4(),
                'task' => $item['task'],
                'status' => $item['status'],
                'description' => $item['description'],
                'obstacle' => $item['obstacle']
            ]);
        }
		$result = $this->baseStore($request->_method, new Story(), $values, 'Story','story_detail', $child);
		return $this->baseRedirect($request, 'story',$result);
	}
	public function show($id){
		$data = Story::findOrFail($id);
		$fieldOnForm = Story::getFieldOnForm();
		return view('story.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Story::findOrFail($id);
		$fieldOnForm = Story::getFieldOnForm();
        $location = to_dropdown(config('options.location'),'key', 'value');
        \Assets::addJs('admin\story.js');
		return view('story.form', compact('data','fieldOnForm','location'));
	}
	public function update(StoreUpdateStory $request, $id){
		$values = $request->except('_token', '_method', 'child');
		$result = $this->baseStore($request->_method, Story::findOrFail($id), $values, 'Story', null, $request->child);
		return $this->baseRedirect($request, 'story',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Story::findOrFail($id), true);
		return $this->baseRedirect($request, 'story',$result);
	}
	public function softdelete($id){
		$result = $this->baseStore(null, Story::findOrFail($id), ['deleted_at' => Carbon::now()]);
		return $this->baseRedirect(new Request(), 'story', $result);
    }

    private function create_dropdown_second(){
        $second = [];
        for($i=1;$i<=60;$i++){
            $second[] = $i;
        }
        return to_dropdown($second);
    }
}

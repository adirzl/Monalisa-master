PGDMP         "                x            project_diary    10.5    10.5 Z    y           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            z           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            {           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            |           1262    33062    project_diary    DATABASE     �   CREATE DATABASE project_diary WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United Kingdom.1252' LC_CTYPE = 'English_United Kingdom.1252';
    DROP DATABASE project_diary;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            }           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12924    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            ~           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    33358    failed_jobs    TABLE     �   CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         postgres    false    3            �            1259    33356    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public       postgres    false    3    201                       0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
            public       postgres    false    200            �            1259    33330 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         postgres    false    3            �            1259    33328    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public       postgres    false    3    197            �           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
            public       postgres    false    196            �            1259    33398    model_has_permissions    TABLE     �   CREATE TABLE public.model_has_permissions (
    permission_id bigint NOT NULL,
    model_type character varying(255) NOT NULL,
    model_id uuid NOT NULL
);
 )   DROP TABLE public.model_has_permissions;
       public         postgres    false    3            �            1259    33409    model_has_roles    TABLE     �   CREATE TABLE public.model_has_roles (
    role_id bigint NOT NULL,
    model_type character varying(255) NOT NULL,
    model_id uuid NOT NULL
);
 #   DROP TABLE public.model_has_roles;
       public         postgres    false    3            �            1259    33477 
   opt_groups    TABLE     8  CREATE TABLE public.opt_groups (
    id uuid NOT NULL,
    name character varying(32) NOT NULL,
    "group" character varying(4) NOT NULL,
    status smallint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);
    DROP TABLE public.opt_groups;
       public         postgres    false    3            �            1259    33483 
   opt_values    TABLE     8  CREATE TABLE public.opt_values (
    id uuid NOT NULL,
    opt_group_id uuid NOT NULL,
    key character varying(4) NOT NULL,
    value character varying(128) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);
    DROP TABLE public.opt_values;
       public         postgres    false    3            �            1259    33368    pages    TABLE     �  CREATE TABLE public.pages (
    id uuid NOT NULL,
    label character varying(50) NOT NULL,
    uri character varying(50) NOT NULL,
    icon character varying(50),
    parent_id uuid,
    visible boolean NOT NULL,
    sequence character varying(10) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);
    DROP TABLE public.pages;
       public         postgres    false    3            �            1259    33349    password_resets    TABLE     �   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         postgres    false    3            �            1259    33378    permissions    TABLE     �   CREATE TABLE public.permissions (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    guard_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.permissions;
       public         postgres    false    3            �            1259    33376    permissions_id_seq    SEQUENCE     {   CREATE SEQUENCE public.permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.permissions_id_seq;
       public       postgres    false    204    3            �           0    0    permissions_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.permissions_id_seq OWNED BY public.permissions.id;
            public       postgres    false    203            �            1259    33435    role_has_pages    TABLE     `   CREATE TABLE public.role_has_pages (
    page_id uuid NOT NULL,
    role_id integer NOT NULL
);
 "   DROP TABLE public.role_has_pages;
       public         postgres    false    3            �            1259    33420    role_has_permissions    TABLE     m   CREATE TABLE public.role_has_permissions (
    permission_id bigint NOT NULL,
    role_id bigint NOT NULL
);
 (   DROP TABLE public.role_has_permissions;
       public         postgres    false    3            �            1259    33389    roles    TABLE     �   CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    guard_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.roles;
       public         postgres    false    3            �            1259    33387    roles_id_seq    SEQUENCE     u   CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.roles_id_seq;
       public       postgres    false    3    206            �           0    0    roles_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;
            public       postgres    false    205            �            1259    33461    story_details    TABLE     F  CREATE TABLE public.story_details (
    id uuid NOT NULL,
    story_id uuid NOT NULL,
    task text NOT NULL,
    status character varying(2) NOT NULL,
    description text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);
 !   DROP TABLE public.story_details;
       public         postgres    false    3            �            1259    33450    storys    TABLE     �  CREATE TABLE public.storys (
    id uuid NOT NULL,
    date_story date NOT NULL,
    check_in time(0) without time zone NOT NULL,
    check_out time(0) without time zone NOT NULL,
    location character varying(2) NOT NULL,
    user_id uuid NOT NULL,
    status character varying(2) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);
    DROP TABLE public.storys;
       public         postgres    false    3            �            1259    33336    users    TABLE     �  CREATE TABLE public.users (
    id uuid NOT NULL,
    username character varying(32) NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         postgres    false    3            �
           2604    33361    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    201    200    201            �
           2604    33333    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    197    196    197            �
           2604    33381    permissions id    DEFAULT     p   ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);
 =   ALTER TABLE public.permissions ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    204    203    204            �
           2604    33392    roles id    DEFAULT     d   ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);
 7   ALTER TABLE public.roles ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    205    206    206            i          0    33358    failed_jobs 
   TABLE DATA               [   COPY public.failed_jobs (id, connection, queue, payload, exception, failed_at) FROM stdin;
    public       postgres    false    201   �l       e          0    33330 
   migrations 
   TABLE DATA               :   COPY public.migrations (id, migration, batch) FROM stdin;
    public       postgres    false    197   �l       o          0    33398    model_has_permissions 
   TABLE DATA               T   COPY public.model_has_permissions (permission_id, model_type, model_id) FROM stdin;
    public       postgres    false    207   xm       p          0    33409    model_has_roles 
   TABLE DATA               H   COPY public.model_has_roles (role_id, model_type, model_id) FROM stdin;
    public       postgres    false    208   �m       u          0    33477 
   opt_groups 
   TABLE DATA               c   COPY public.opt_groups (id, name, "group", status, created_at, updated_at, deleted_at) FROM stdin;
    public       postgres    false    213   �m       v          0    33483 
   opt_values 
   TABLE DATA               f   COPY public.opt_values (id, opt_group_id, key, value, created_at, updated_at, deleted_at) FROM stdin;
    public       postgres    false    214   �n       j          0    33368    pages 
   TABLE DATA               w   COPY public.pages (id, label, uri, icon, parent_id, visible, sequence, created_at, updated_at, deleted_at) FROM stdin;
    public       postgres    false    202   �p       g          0    33349    password_resets 
   TABLE DATA               C   COPY public.password_resets (email, token, created_at) FROM stdin;
    public       postgres    false    199   s       l          0    33378    permissions 
   TABLE DATA               S   COPY public.permissions (id, name, guard_name, created_at, updated_at) FROM stdin;
    public       postgres    false    204    s       r          0    33435    role_has_pages 
   TABLE DATA               :   COPY public.role_has_pages (page_id, role_id) FROM stdin;
    public       postgres    false    210   t       q          0    33420    role_has_permissions 
   TABLE DATA               F   COPY public.role_has_permissions (permission_id, role_id) FROM stdin;
    public       postgres    false    209   �t       n          0    33389    roles 
   TABLE DATA               M   COPY public.roles (id, name, guard_name, created_at, updated_at) FROM stdin;
    public       postgres    false    206   7u       t          0    33461    story_details 
   TABLE DATA               t   COPY public.story_details (id, story_id, task, status, description, created_at, updated_at, deleted_at) FROM stdin;
    public       postgres    false    212   |u       s          0    33450    storys 
   TABLE DATA               �   COPY public.storys (id, date_story, check_in, check_out, location, user_id, status, created_at, updated_at, deleted_at) FROM stdin;
    public       postgres    false    211   {       f          0    33336    users 
   TABLE DATA                  COPY public.users (id, username, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
    public       postgres    false    198   :       �           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
            public       postgres    false    200            �           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 7, true);
            public       postgres    false    196            �           0    0    permissions_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.permissions_id_seq', 19, true);
            public       postgres    false    203            �           0    0    roles_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.roles_id_seq', 1, false);
            public       postgres    false    205            �
           2606    33367    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public         postgres    false    201            �
           2606    33335    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public         postgres    false    197            �
           2606    33408 0   model_has_permissions model_has_permissions_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT model_has_permissions_pkey PRIMARY KEY (permission_id, model_id, model_type);
 Z   ALTER TABLE ONLY public.model_has_permissions DROP CONSTRAINT model_has_permissions_pkey;
       public         postgres    false    207    207    207            �
           2606    33419 $   model_has_roles model_has_roles_pkey 
   CONSTRAINT     }   ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT model_has_roles_pkey PRIMARY KEY (role_id, model_id, model_type);
 N   ALTER TABLE ONLY public.model_has_roles DROP CONSTRAINT model_has_roles_pkey;
       public         postgres    false    208    208    208            �
           2606    33481    opt_groups opt_groups_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.opt_groups
    ADD CONSTRAINT opt_groups_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.opt_groups DROP CONSTRAINT opt_groups_pkey;
       public         postgres    false    213            �
           2606    33487    opt_values opt_values_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.opt_values
    ADD CONSTRAINT opt_values_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.opt_values DROP CONSTRAINT opt_values_pkey;
       public         postgres    false    214            �
           2606    33372    pages pages_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.pages
    ADD CONSTRAINT pages_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.pages DROP CONSTRAINT pages_pkey;
       public         postgres    false    202            �
           2606    33386    permissions permissions_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.permissions DROP CONSTRAINT permissions_pkey;
       public         postgres    false    204            �
           2606    33449 "   role_has_pages role_has_pages_pkey 
   CONSTRAINT     n   ALTER TABLE ONLY public.role_has_pages
    ADD CONSTRAINT role_has_pages_pkey PRIMARY KEY (page_id, role_id);
 L   ALTER TABLE ONLY public.role_has_pages DROP CONSTRAINT role_has_pages_pkey;
       public         postgres    false    210    210            �
           2606    33434 .   role_has_permissions role_has_permissions_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_pkey PRIMARY KEY (permission_id, role_id);
 X   ALTER TABLE ONLY public.role_has_permissions DROP CONSTRAINT role_has_permissions_pkey;
       public         postgres    false    209    209            �
           2606    33397    roles roles_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.roles DROP CONSTRAINT roles_pkey;
       public         postgres    false    206            �
           2606    33468     story_details story_details_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.story_details
    ADD CONSTRAINT story_details_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.story_details DROP CONSTRAINT story_details_pkey;
       public         postgres    false    212            �
           2606    33454    storys storys_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.storys
    ADD CONSTRAINT storys_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.storys DROP CONSTRAINT storys_pkey;
       public         postgres    false    211            �
           2606    33348    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public         postgres    false    198            �
           2606    33343    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public         postgres    false    198            �
           2606    33346    users users_username_unique 
   CONSTRAINT     Z   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_unique UNIQUE (username);
 E   ALTER TABLE ONLY public.users DROP CONSTRAINT users_username_unique;
       public         postgres    false    198            �
           1259    33401 /   model_has_permissions_model_id_model_type_index    INDEX     �   CREATE INDEX model_has_permissions_model_id_model_type_index ON public.model_has_permissions USING btree (model_id, model_type);
 C   DROP INDEX public.model_has_permissions_model_id_model_type_index;
       public         postgres    false    207    207            �
           1259    33412 )   model_has_roles_model_id_model_type_index    INDEX     u   CREATE INDEX model_has_roles_model_id_model_type_index ON public.model_has_roles USING btree (model_id, model_type);
 =   DROP INDEX public.model_has_roles_model_id_model_type_index;
       public         postgres    false    208    208            �
           1259    33482    opt_groups_id_index    INDEX     H   CREATE INDEX opt_groups_id_index ON public.opt_groups USING btree (id);
 '   DROP INDEX public.opt_groups_id_index;
       public         postgres    false    213            �
           1259    33493    opt_values_id_index    INDEX     H   CREATE INDEX opt_values_id_index ON public.opt_values USING btree (id);
 '   DROP INDEX public.opt_values_id_index;
       public         postgres    false    214            �
           1259    33373    pages_id_index    INDEX     >   CREATE INDEX pages_id_index ON public.pages USING btree (id);
 "   DROP INDEX public.pages_id_index;
       public         postgres    false    202            �
           1259    33374    pages_label_index    INDEX     D   CREATE INDEX pages_label_index ON public.pages USING btree (label);
 %   DROP INDEX public.pages_label_index;
       public         postgres    false    202            �
           1259    33375    pages_parent_id_index    INDEX     L   CREATE INDEX pages_parent_id_index ON public.pages USING btree (parent_id);
 )   DROP INDEX public.pages_parent_id_index;
       public         postgres    false    202            �
           1259    33355    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public         postgres    false    199            �
           1259    33474    story_details_id_index    INDEX     N   CREATE INDEX story_details_id_index ON public.story_details USING btree (id);
 *   DROP INDEX public.story_details_id_index;
       public         postgres    false    212            �
           1259    33460    storys_id_index    INDEX     @   CREATE INDEX storys_id_index ON public.storys USING btree (id);
 #   DROP INDEX public.storys_id_index;
       public         postgres    false    211            �
           1259    33344    users_id_index    INDEX     >   CREATE INDEX users_id_index ON public.users USING btree (id);
 "   DROP INDEX public.users_id_index;
       public         postgres    false    198            �
           2606    33402 A   model_has_permissions model_has_permissions_permission_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT model_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;
 k   ALTER TABLE ONLY public.model_has_permissions DROP CONSTRAINT model_has_permissions_permission_id_foreign;
       public       postgres    false    207    204    2761            �
           2606    33413 /   model_has_roles model_has_roles_role_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT model_has_roles_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;
 Y   ALTER TABLE ONLY public.model_has_roles DROP CONSTRAINT model_has_roles_role_id_foreign;
       public       postgres    false    2763    206    208            �
           2606    33488 *   opt_values opt_values_opt_group_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.opt_values
    ADD CONSTRAINT opt_values_opt_group_id_foreign FOREIGN KEY (opt_group_id) REFERENCES public.opt_groups(id) ON DELETE CASCADE;
 T   ALTER TABLE ONLY public.opt_values DROP CONSTRAINT opt_values_opt_group_id_foreign;
       public       postgres    false    213    2782    214            �
           2606    33438 -   role_has_pages role_has_pages_page_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.role_has_pages
    ADD CONSTRAINT role_has_pages_page_id_foreign FOREIGN KEY (page_id) REFERENCES public.pages(id) ON DELETE CASCADE;
 W   ALTER TABLE ONLY public.role_has_pages DROP CONSTRAINT role_has_pages_page_id_foreign;
       public       postgres    false    202    210    2759            �
           2606    33443 -   role_has_pages role_has_pages_role_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.role_has_pages
    ADD CONSTRAINT role_has_pages_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;
 W   ALTER TABLE ONLY public.role_has_pages DROP CONSTRAINT role_has_pages_role_id_foreign;
       public       postgres    false    2763    206    210            �
           2606    33423 ?   role_has_permissions role_has_permissions_permission_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;
 i   ALTER TABLE ONLY public.role_has_permissions DROP CONSTRAINT role_has_permissions_permission_id_foreign;
       public       postgres    false    209    204    2761            �
           2606    33428 9   role_has_permissions role_has_permissions_role_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;
 c   ALTER TABLE ONLY public.role_has_permissions DROP CONSTRAINT role_has_permissions_role_id_foreign;
       public       postgres    false    209    206    2763            �
           2606    33469 ,   story_details story_details_story_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.story_details
    ADD CONSTRAINT story_details_story_id_foreign FOREIGN KEY (story_id) REFERENCES public.storys(id) ON DELETE CASCADE;
 V   ALTER TABLE ONLY public.story_details DROP CONSTRAINT story_details_story_id_foreign;
       public       postgres    false    212    2776    211            �
           2606    33455    storys storys_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.storys
    ADD CONSTRAINT storys_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;
 G   ALTER TABLE ONLY public.storys DROP CONSTRAINT storys_user_id_foreign;
       public       postgres    false    198    211    2749            i      x������ � �      e   �   x�]�K�0�us;�q�QJ�TDiq}R���ތl��R� �}�Q|<T�"��&������>�8"�J*�F��=ֽ�\�t��e(�Μ-,�l�p��$q��i��=�s�c$Γ��o?܁�L5u�>���rmC}qI��*6��1��^�      o      x������ � �      p   F   x�3�t,(����OI�)��	-N-�L660�L22�5�05�51OK�M435�MN3O663I�L14������ B��      u   �   x�m�Kj�@E�qk�@����-"+0��BH���x�Q�F�Fwrx�� �b�D[�ȃj��|�\���j�_ۯ��n�02Z`��Oj��e�}.�#�Gё��8��hD��n�nf>�����y�n%�Ω\�Sn(��P����JV|�öA����uE ��I5�x�N����-�b��"Z8R܋y�}{��|��]�C"M�.�)�>�e��=_      v   �  x����jAE�=_�?�PRI��]�	�&�&d�M=�`��al��ȁ��;0ۻ�st���0�L�(�Y:Ԥf/[�K�hƄZ[���fi�)k�^\������ޚ�](P����h#>��6ge�'p���j����D�΃����?X�����\2�̀M��a�� �HQZm�˂Z����(��	Z�&���J�����y�z�\��VL�-�a��2����Ԡ� ��[��mB�΀����o9\3g��U�4�O/�A�'���B0�`�d���|�����@.�4�~ND>���t��/��b�$oT3��-#���À�ѻ����И�::-���?|.���F�!1�S��uT(�2L�V�,�ilA�[���P���ҩ�,�ݧ��~{��+�_�̻f<�_:f�=��������ކ�$4�\���?�7�Iߢ$f��{w:�~hg�8      j   D  x��TMk�0<+����iW��[Z�)V�:ym�ll�@�}�|���P���vf5#C�g���`-W��=Hl��ު/<_偧��cu5܈:?U�2
5j��;M���M����gI����z"`)B�	}��S)2ϻ��a��k��oy.�~\��a_�����|O�o�G�E$D�hؔ��\����F��_��e�.�qY����P�����^5DS��M[SKt.4<H&�12dG�#�����:��f?���Ƨ�u�i#g���C���d`�#x_]�A��9�c�?j�[�M�A�����N�3�X�	���>@���!�O�4iSr��۸��w_��8�a\.��}!������ 1������l��MRzn���:�6���iY��&�:�����[�Bɓ��A�O�>ʪ���x�&|��h[�xM�3��F�6ӃA/��F���q�����W�؇f�IN���"����gH�f6َhk��k��[=AA(���vf���~yb1�;���mb�E��A�4W˚�\Z�ګ+:F�]�w�iQ����1Ӷ]�����m�1�899�jtUB      g      x������ � �      l   �   x���K�0��p
.�)���,&f��T�m���mwn:l�|g:�:���Z��N�V-zeF��)��D�I���T�'Y�;K$��pܔQ��l
)�Ҡ�'Ū��r>�й��.�ׁ;b�=�f약��F�UK铬�9ov�/}�r�kc0��<_�e�����aa&(�@��X¬ޡK��9��WFB�ox�jf<p_�������K��%}�      r   �   x���m 1��^X��K>�Wh�C��&_�� �|!x�&�D�k򃏠
w&h�1f�>��&���`ķ�=�HdA�B�`����9�{B��w1HDB)�r�0'eY����RW�٫^���~��{��(��!b�oC�(�t��ܘ^�9��xY��Ⅷ��TWz5�pϯTg����6V��:pyGv>[�MԳ"$�|}������S      q   5   x�ʹ ! ���\����;XE�C՚u6mٶc��$+y�Ln�������
1      n   5   x�3�.-H-RpL����,OM�4202�50�52R00�21�22�&����� ��      t   �  x��WA�7<�_�`
 A��#�\<$�$��4�ڭ�z�rn,��F�v�j3��9iWK�fK����2籯��7��V��T4�|�z)u��&���/�_BB�r��&�}h�����潵K{hK�S�I����j��Ip9�����L�j*s(:OczO�$��\�j��X��<� \�BY3��<tn��~켼Qy�>8�� .���-�IG��}zBCY��,-.�ym�;�=锝�%��6�j�e�W��!t[x���e�R+h��S�@{,��W!�l��`[�R�ԛ�C���3	��G��Y;��ޢJꣂv�s�xI=r ���\���r��F_w_�q0��?��� �r^��� p��9�X�Z�]�J�kF�A�R��/m03�{R�)̳z�/��?	�_5����IA&c���k)��(�#{�z�}/�i5<Ss.ɷR�>b���j�"���5��\�Ƙy�qZO�nO+����"���Bv:�j���QW�����ok �*>��Kq����}���}�`���uh���U+�gIͣ$�!/]���>k�nk ��Q2����^	Z���Ce��J����@u�d3���8��/b|�8Cܷ5��@ZM+ƹ`2�0��(-8&�]^K�r��C����D"JC���W{}�~���v�5�����:��������T��Um�v,vy��`��ɎUk�v	�݂���b���W�n�2ZRȨ��3�Iy��-���}B�� h��I �3�W�����v���1N+�ܘ�㣇�����!�fNe��6`�'j�r5�a�p�P�r[;����s����w�)���9BiUW�A3�X��y���2� ��ڽڟ@_���vRm��h��.�{����(�������=S`9�>;��0 �d{�㗴ׯ�{�=�{��"x�y�@W	�S����^�z.8Z���:R۫���������y�A��@\�ю�p�H|��Wх�vM�9�5��}�/�AE�T��W$H�����j� �汎�3b��qS!3��'Y��#��(��v&p}�����.?��G����h�K���OPJ�t7�S�j���)dDiijl����0��9�z�p�I���1�c�f0��i"Rǉ̶i��m]��8�~3� �� �4g�K��ۙ�^#~P���J)��2�Wϝ`����(4�d���{�0D$��Uk�\sĆ`����
V*��,f�QgP8OS� ��D�Z���������7p��)�� �Á�p�������|A���Oo�Q�E�n����|��i3�fR5\-��1��}P���?��7��g|�=��t���<ϥ�)2B`��q��ϥ6�?����F-�zbޞ��p�͌ 4xȗi| ᤨ��s]����%����KG�f)��x��������/��~����? c      s     x���Kv+9���*���E�
�D��/�Q��ؕ�te��O�_�4��I]�'�����
j"�L!�0 `��7w�;���2��"F�!�f�:�$
mj���uZ�����s>��������]�փS�
9�1�����ʍ�*n0�4����?������S�}b���0�&�̨���,���F���ӸJ��O5���'��#f�*P�-�fs��=��Tz�T��T�K�d�u�<z��K���i����mT�q���QO5�j#r��`��3�
��QK��@�I�4�Q��{��iN5J��qB�(�1
��de����#Uة�/r��§�SaM�-E0]����W=C�B%�h�G�$?��E*wv�9ժP2Y����l�7b��BU���1��n\�J�9�SͩXz���s�G�W���朎J	�T�S]﫴�IO5��I�L#�O�,>*�
ca�>�@���zs�·
�ڪ����Jrg`���d�ڧ���;ϑn>��Q�ݸDe�9詶����Neͧ��������Vc��ꑊv*�ݣ�j��#t�W(�+��o��L��ǆ���'Uܩ��A[բp��ٞz� ���|^�Q|������H�;�����jל�J��z�������{-q�΂*J?*�v���t��][���#r�E�U�yZF*��Ξ�M�`��I%�ɕ��J�\�WĔ ������Ѳ�I��G��qv�
��Kwf<��%��/�ʠ�{��u 	`��P�UZ��lM�2.Q�rf;��l��P�B�� K����8|o;��x�⫳��j}^2/mu����3��8ӯ�����ZU<R�Ne����%�Ҝ*� E_Ǒ����w�[E���fE>�V՞���q��_�#�N�u_!�FEA�c�y��zW )�}��#�T���E�;/�j덣�C_�9g�dH��@��̾
���kh�q���[ԣЪ�_x�پ"�o��n�����if��V�-y5�	~��O�?},����_�7ڕGώ�Β����O����}������?��2:      f   �   x�m̱�0@ѹ|kIy�����M !���J1Z�����x�p2�[TF!R.{EJ�z�Ppw#sC.ˤ��3����4�諗!��Q��e�p�� |��yk;�����-��>���.�.�|�)L����
�ќ��ش�ρ���sÜ�w��.2)     
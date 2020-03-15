<?php

namespace Modules\UserConfig\Http\Controllers;

use GroceryCrud\Core\GroceryCrud;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class UserConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private function _getDatabaseConnection() {
        $databaseConnection = config('database.default');
        $databaseConfig = config('database.connections.' . $databaseConnection);
        return [
            'adapter' => [
                'driver' => 'Pdo_Mysql',
                'host'  =>$databaseConfig['host'],
                'database' => $databaseConfig['database'],
                'username' => $databaseConfig['username'],
                'password' => $databaseConfig['password'],
                'charset' => 'utf8'
            ]
        ];
    }
    private function _getGroceryCrudEnterprise() {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');
        $crud = new GroceryCrud($config, $database);
        return $crud;
    }
    private function _show_output($output) {
        if ($output->isJSONResponse) {
            return response($output->output, 200)
                  ->header('Content-Type', 'application/json')
                  ->header('charset', 'utf-8');
        }
        $css_files = $output->css_files;
        $js_files = $output->js_files;
        $output = $output->output;
        return view('userconfig::index', [
            'output' => $output,
            'css_files' => $css_files,
            'js_files' => $js_files
        ]);
    }
    public function index()
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setTable('users');
        $crud->unsetJquery();
        $crud->setSkin('bootstrap-v4');
        $crud->setSubject('Users');
        $crud->setRelation('roles_id','roles','role_name');
        $crud->columns(['name','email','roles_id']);
        $crud->displayAs([
            'roles_id'  =>'User Role'
        ]);
        $crud->callbackAfterInsert(function($s){
            $id=$s->insertId;
            $password= Hash::make($s->data['password']);
            User::where('id',$id)->update(['password'=>$password]);
            
            return $s;
        });
        // $crud->callbackColumn('company_name',function($value,$row){
        //     return "<a href='company/detail/$row->id'>$value</a>";
        // });
        $output = $crud->render();
        return $this->_show_output($output);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('userconfig::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('userconfig::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('userconfig::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

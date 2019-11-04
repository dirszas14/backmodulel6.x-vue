<?php

namespace Modules\Company\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
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
        return view('company::index', [
            'output' => $output,
            'css_files' => $css_files,
            'js_files' => $js_files
        ]);
    }
    public function index()
    {
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setTable('companies');
        $crud->unsetJquery();
        $crud->setSkin('bootstrap-v4');
        $crud->setSubject('Company', 'Companies');
        $crud->callbackColumn('company_name',function($value,$row){
            return "<a href='company/detail/$row->id'>$value</a>";
        });
        $output = $crud->render();
        return $this->_show_output($output);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('company::create');
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
        $data['companyinfo']=DB::table('companies')->where('id',$id)->first();
        return view('company::detail',$data);
    }
    public function getview(Request $request)
    {
        $id=$request->id;
        $data['companyinfo']=DB::table('companies')->where('id',$id)->first();

        switch($request->pages){
            case 'detail':
            return view('company::pages.detailcompany',$data);
            break;
        }
    }
}

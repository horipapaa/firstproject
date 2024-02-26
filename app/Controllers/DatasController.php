<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CalculatorModel;

class DatasController extends BaseController
{
    public function index()
    {
        try {
            $calculatorModel = new CalculatorModel();
            $data['calculations'] = $calculatorModel->findAll();

            return view('records', $data);
        } catch (\Exception $e) {
            
            $data['error'] = 'Database error occurred: ' . $e->getMessage();
        }
        return view('records, $data');
    }
    

    public function saveRecord()
    {
        $username = $this->request->getPost('username');
        $number1 = $this->request->getPost('number1');
        $number2 = $this->request->getPost('number2');
        $result = $number1 + $number2;

        $calculatorModel = new CalculatorModel();
        $existingRecord = $calculatorModel->where('username', $username)->first();
        if ($existingRecord) {
            
            return redirect()->to('/')->with('error', 'Username already exists.');
        }

        try {
            $calculatorModel->insert([
                'username' => $username,
                'number1' => $number1,
                'number2' => $number2,
                'result' => $result
            ]);
            return redirect()->to('/datas');
        } catch (\Exception $e) {
            
            return redirect()->to('/')->with('error', 'Database error occurred: ' . $e->getMessage());
        }
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        // Temporary in-memory data source, as required by TFA5.
        $users = [
            ['id' => 'U-001', 'name' => 'Admin User', 'email' => 'admin@pos.test', 'role' => 'Administrator', 'status' => 'Active'],
            ['id' => 'U-002', 'name' => 'Cashier One', 'email' => 'cashier1@pos.test', 'role' => 'Cashier', 'status' => 'Active'],
            ['id' => 'U-003', 'name' => 'Cashier Two', 'email' => 'cashier2@pos.test', 'role' => 'Cashier', 'status' => 'Active'],
            ['id' => 'U-004', 'name' => 'Inventory Staff', 'email' => 'inventory@pos.test', 'role' => 'Inventory Staff', 'status' => 'Inactive'],
            ['id' => 'U-005', 'name' => 'Manager User', 'email' => 'manager@pos.test', 'role' => 'Manager', 'status' => 'Active'],
        ];

        return view('users.index', compact('users'));
    }
}

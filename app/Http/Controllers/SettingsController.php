<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        // Static settings data for now
        $settings = [
            // Company Information
            'company_name' => 'TechJoint IMS',
            'company_email' => 'admin@techjoint.com',
            'company_phone' => '+1 (555) 123-4567',
            'company_address' => '123 Business Center, Suite 456',
            'company_city' => 'New York',
            'company_state' => 'NY',
            'company_zip' => '10001',
            'company_country' => 'United States',
            'company_website' => 'https://techjoint.com',
            'company_logo' => null,
            
            // Inventory Settings
            'low_stock_threshold' => 10,
            'critical_stock_threshold' => 5,
            'auto_reorder' => true,
            'stock_notifications' => true,
            'barcode_format' => 'CODE128',
            'default_currency' => 'USD',
            'tax_rate' => 8.5,
            
            // Email Notifications
            'low_stock_email' => true,
            'order_confirmation_email' => true,
            'shipment_notification_email' => true,
            'daily_report_email' => false,
            'weekly_report_email' => true,
            'monthly_report_email' => true,
            
            // System Settings
            'timezone' => 'America/New_York',
            'date_format' => 'Y-m-d',
            'time_format' => '24h',
            'items_per_page' => 25,
            'backup_frequency' => 'daily',
            'maintenance_mode' => false
        ];

        return view('settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            // Company Information
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email|max:255',
            'company_phone' => 'required|string|max:20',
            'company_address' => 'required|string|max:255',
            'company_city' => 'required|string|max:100',
            'company_state' => 'required|string|max:100',
            'company_zip' => 'required|string|max:20',
            'company_country' => 'required|string|max:100',
            'company_website' => 'nullable|url|max:255',
            
            // Inventory Settings
            'low_stock_threshold' => 'required|integer|min:1|max:1000',
            'critical_stock_threshold' => 'required|integer|min:1|max:100',
            'auto_reorder' => 'boolean',
            'stock_notifications' => 'boolean',
            'barcode_format' => 'required|in:CODE128,CODE39,EAN13,QR',
            'default_currency' => 'required|string|size:3',
            'tax_rate' => 'required|numeric|min:0|max:100',
            
            // Email Notifications
            'low_stock_email' => 'boolean',
            'order_confirmation_email' => 'boolean',
            'shipment_notification_email' => 'boolean',
            'daily_report_email' => 'boolean',
            'weekly_report_email' => 'boolean',
            'monthly_report_email' => 'boolean',
            
            // System Settings
            'timezone' => 'required|string',
            'date_format' => 'required|in:Y-m-d,m/d/Y,d/m/Y',
            'time_format' => 'required|in:12h,24h',
            'items_per_page' => 'required|integer|min:10|max:100',
            'backup_frequency' => 'required|in:daily,weekly,monthly',
            'maintenance_mode' => 'boolean'
        ]);

        // Here you would save settings to database or config
        // Setting::updateOrCreate(['key' => 'company_settings'], ['value' => $request->all()]);

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully!');
    }
}

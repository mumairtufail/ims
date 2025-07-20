@extends('layout.app')

@section('content')

    <!-- start page title -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="text-default-900 text-2xl font-medium mb-2">Settings Management</h4>
           <nav class="flex py-3" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <!-- Dashboard -->
        <li class="inline-flex items-center">
            <a href="{{ route('dashboard') }}"
               class="text-default-600 hover:text-primary-600 font-medium transition-colors duration-150 ease-in-out">
                Dashboard
            </a>
        </li>
        <!-- Separator + Settings -->
        <li>
            <div class="flex items-center">
                <!-- Black SVG caret separator -->
                <span class="mx-2" aria-hidden="true">
                    <svg class="w-4 h-4" fill="none" stroke="black" stroke-width="2" viewBox="0 0 16 16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 4l4 4-4 4"/>
                    </svg>
                </span>
                <span class="ml-1 text-default-500 md:ml-2 font-semibold" aria-current="page">
                    Settings
                </span>
            </div>
        </li>
    </ol>
</nav>

        </div>
    </div>
    <!-- end page title -->

    <div class="grid xl:grid-cols-1 gap-6">
        <!-- General Settings -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">General Settings</h4>
            </div>
            <div class="p-6">
                <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid lg:grid-cols-2 gap-6">

                        <div class="mb-5">
                            <label for="company_name" class="text-default-800 text-sm font-medium inline-block mb-2">Company Name</label>
                            <input type="text" id="company_name" name="company_name" class="form-input" placeholder="Enter company name" value="{{ $settings['company_name'] ?? 'TechJoint IMS' }}" required>
                        </div>

                        <div class="mb-5">
                            <label for="company_email" class="text-default-800 text-sm font-medium inline-block mb-2">Company Email</label>
                            <input type="email" id="company_email" name="company_email" class="form-input" placeholder="Enter company email" value="{{ $settings['company_email'] ?? 'admin@techjoint.com' }}" required>
                        </div>

                        <div class="mb-5">
                            <label for="company_phone" class="text-default-800 text-sm font-medium inline-block mb-2">Company Phone</label>
                            <input type="tel" id="company_phone" name="company_phone" class="form-input" placeholder="Enter company phone" value="{{ $settings['company_phone'] ?? '+1 (555) 123-4567' }}">
                        </div>

                        <div class="mb-5">
                            <label for="timezone" class="text-default-800 text-sm font-medium inline-block mb-2">Timezone</label>
                            <select id="timezone" name="timezone" class="form-input" required>
                                <option value="UTC" {{ ($settings['timezone'] ?? 'UTC') == 'UTC' ? 'selected' : '' }}>UTC</option>
                                <option value="America/New_York" {{ ($settings['timezone'] ?? '') == 'America/New_York' ? 'selected' : '' }}>Eastern Time</option>
                                <option value="America/Chicago" {{ ($settings['timezone'] ?? '') == 'America/Chicago' ? 'selected' : '' }}>Central Time</option>
                                <option value="America/Denver" {{ ($settings['timezone'] ?? '') == 'America/Denver' ? 'selected' : '' }}>Mountain Time</option>
                                <option value="America/Los_Angeles" {{ ($settings['timezone'] ?? '') == 'America/Los_Angeles' ? 'selected' : '' }}>Pacific Time</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="currency" class="text-default-800 text-sm font-medium inline-block mb-2">Default Currency</label>
                            <select id="currency" name="currency" class="form-input" required>
                                <option value="USD" {{ ($settings['currency'] ?? 'USD') == 'USD' ? 'selected' : '' }}>USD - US Dollar</option>
                                <option value="EUR" {{ ($settings['currency'] ?? '') == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
                                <option value="GBP" {{ ($settings['currency'] ?? '') == 'GBP' ? 'selected' : '' }}>GBP - British Pound</option>
                                <option value="CAD" {{ ($settings['currency'] ?? '') == 'CAD' ? 'selected' : '' }}>CAD - Canadian Dollar</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="date_format" class="text-default-800 text-sm font-medium inline-block mb-2">Date Format</label>
                            <select id="date_format" name="date_format" class="form-input" required>
                                <option value="Y-m-d" {{ ($settings['date_format'] ?? 'Y-m-d') == 'Y-m-d' ? 'selected' : '' }}>YYYY-MM-DD</option>
                                <option value="m/d/Y" {{ ($settings['date_format'] ?? '') == 'm/d/Y' ? 'selected' : '' }}>MM/DD/YYYY</option>
                                <option value="d/m/Y" {{ ($settings['date_format'] ?? '') == 'd/m/Y' ? 'selected' : '' }}>DD/MM/YYYY</option>
                                <option value="M d, Y" {{ ($settings['date_format'] ?? '') == 'M d, Y' ? 'selected' : '' }}>Mon DD, YYYY</option>
                            </select>
                        </div>

                        <div class="mb-5 lg:col-span-2">
                            <label for="company_address" class="text-default-800 text-sm font-medium inline-block mb-2">Company Address</label>
                            <textarea id="company_address" name="company_address" rows="3" class="form-input" placeholder="Enter company address...">{{ $settings['company_address'] ?? '123 Business St, Suite 100, City, State 12345' }}</textarea>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <!-- Inventory Settings -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Inventory Settings</h4>
            </div>
            <div class="p-6">
                <div class="grid lg:grid-cols-2 gap-6">

                    <div class="mb-5">
                        <label for="low_stock_threshold" class="text-default-800 text-sm font-medium inline-block mb-2">Low Stock Threshold</label>
                        <input type="number" id="low_stock_threshold" name="low_stock_threshold" class="form-input" placeholder="5" min="0" value="{{ $settings['low_stock_threshold'] ?? '5' }}">
                    </div>

                    <div class="mb-5">
                        <label for="auto_sku_generation" class="text-default-800 text-sm font-medium inline-block mb-2">Auto SKU Generation</label>
                        <select id="auto_sku_generation" name="auto_sku_generation" class="form-input">
                            <option value="1" {{ ($settings['auto_sku_generation'] ?? '1') == '1' ? 'selected' : '' }}>Enabled</option>
                            <option value="0" {{ ($settings['auto_sku_generation'] ?? '') == '0' ? 'selected' : '' }}>Disabled</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label for="stock_tracking" class="text-default-800 text-sm font-medium inline-block mb-2">Stock Tracking</label>
                        <select id="stock_tracking" name="stock_tracking" class="form-input">
                            <option value="1" {{ ($settings['stock_tracking'] ?? '1') == '1' ? 'selected' : '' }}>Enabled</option>
                            <option value="0" {{ ($settings['stock_tracking'] ?? '') == '0' ? 'selected' : '' }}>Disabled</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label for="negative_stock" class="text-default-800 text-sm font-medium inline-block mb-2">Allow Negative Stock</label>
                        <select id="negative_stock" name="negative_stock" class="form-input">
                            <option value="0" {{ ($settings['negative_stock'] ?? '0') == '0' ? 'selected' : '' }}>No</option>
                            <option value="1" {{ ($settings['negative_stock'] ?? '') == '1' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <!-- Email Settings -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Email Settings</h4>
            </div>
            <div class="p-6">
                <div class="grid lg:grid-cols-2 gap-6">

                    <div class="mb-5">
                        <label for="smtp_host" class="text-default-800 text-sm font-medium inline-block mb-2">SMTP Host</label>
                        <input type="text" id="smtp_host" name="smtp_host" class="form-input" placeholder="smtp.gmail.com" value="{{ $settings['smtp_host'] ?? '' }}">
                    </div>

                    <div class="mb-5">
                        <label for="smtp_port" class="text-default-800 text-sm font-medium inline-block mb-2">SMTP Port</label>
                        <input type="number" id="smtp_port" name="smtp_port" class="form-input" placeholder="587" value="{{ $settings['smtp_port'] ?? '587' }}">
                    </div>

                    <div class="mb-5">
                        <label for="smtp_username" class="text-default-800 text-sm font-medium inline-block mb-2">SMTP Username</label>
                        <input type="text" id="smtp_username" name="smtp_username" class="form-input" placeholder="your-email@gmail.com" value="{{ $settings['smtp_username'] ?? '' }}">
                    </div>

                    <div class="mb-5">
                        <label for="smtp_encryption" class="text-default-800 text-sm font-medium inline-block mb-2">SMTP Encryption</label>
                        <select id="smtp_encryption" name="smtp_encryption" class="form-input">
                            <option value="tls" {{ ($settings['smtp_encryption'] ?? 'tls') == 'tls' ? 'selected' : '' }}>TLS</option>
                            <option value="ssl" {{ ($settings['smtp_encryption'] ?? '') == 'ssl' ? 'selected' : '' }}>SSL</option>
                            <option value="none" {{ ($settings['smtp_encryption'] ?? '') == 'none' ? 'selected' : '' }}>None</option>
                        </select>
                    </div>

                    <div class="mb-5 lg:col-span-2">
                        <label for="email_notifications" class="text-default-800 text-sm font-medium inline-block mb-2">Email Notifications</label>
                        <div class="flex flex-wrap gap-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="email_notifications[]" value="low_stock" class="form-checkbox" {{ in_array('low_stock', $settings['email_notifications'] ?? []) ? 'checked' : '' }}>
                                <span class="ml-2">Low Stock Alerts</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="email_notifications[]" value="new_orders" class="form-checkbox" {{ in_array('new_orders', $settings['email_notifications'] ?? []) ? 'checked' : '' }}>
                                <span class="ml-2">New Orders</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="email_notifications[]" value="shipments" class="form-checkbox" {{ in_array('shipments', $settings['email_notifications'] ?? []) ? 'checked' : '' }}>
                                <span class="ml-2">Shipment Updates</span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div class="card">
            <div class="p-6">
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="window.location.reload()" class="btn bg-default-200 border-default-200 text-default-900 hover:bg-default-300">Reset</button>
                    <button type="submit" form="settings-form" class="btn bg-primary border-primary text-white hover:bg-primary-600">
                        <i class="i-ph-floppy-disk text-base me-1"></i>
                        Save Settings
                    </button>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add form ID to the first form for submission
    document.querySelector('form').setAttribute('id', 'settings-form');
    
    // Handle save button click
    document.querySelector('button[type="submit"]').addEventListener('click', function(e) {
        e.preventDefault();
        
        // Show loading state
        this.innerHTML = '<i class="i-ph-spinner text-base me-1 animate-spin"></i>Saving...';
        this.disabled = true;
        
        // Submit the form
        document.getElementById('settings-form').submit();
    });
});
</script>
@endpush

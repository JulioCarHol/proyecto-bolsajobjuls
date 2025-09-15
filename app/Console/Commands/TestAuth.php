<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;

class TestAuth extends Command
{
    protected $signature = 'test:auth';
    protected $description = 'Test authentication with plain text passwords';

    public function handle()
    {
        $this->info('=== TESTING AUTHENTICATION ===');
        
        // List all admins first
        $this->info('All admins in database:');
        $admins = Admin::select('email', 'password')->get();
        foreach ($admins as $admin) {
            $this->info("- {$admin->email} -> [{$admin->password}]");
        }
        
        // Test user authentication (quick test)
        $this->info('Testing User Authentication:');
        $testUser = User::first();
        if ($testUser) {
            $credentials = ['email' => $testUser->email, 'password' => $testUser->password];
            if (Auth::attempt($credentials)) {
                $this->info('✅ User authentication SUCCESS');
            } else {
                $this->error('❌ User authentication FAILED');
            }
            Auth::logout();
        }
        
        // Test admin authentication with detailed debugging
        $this->info('Testing Admin Authentication:');
        $admin = Admin::where('email', 'admin@bolsajobjuls.com')->first();
        if ($admin) {
            $this->info("Admin found: {$admin->email}");
            $this->info("Admin password in DB: [{$admin->password}]");
            $this->info("Password length: " . strlen($admin->password));
            
            // Test with exact password from DB
            $credentials = ['email' => $admin->email, 'password' => $admin->password];
            $this->info("Testing with credentials: email={$credentials['email']}, password=[{$credentials['password']}]");
            
            if (Auth::guard('admin')->attempt($credentials)) {
                $this->info('✅ Admin authentication SUCCESS');
            } else {
                $this->error('❌ Admin authentication FAILED');
                
                // Debug the provider
                $provider = Auth::guard('admin')->getProvider();
                $this->info("Provider class: " . get_class($provider));
                
                // Try to manually validate
                $user = $provider->retrieveByCredentials($credentials);
                if ($user) {
                    $this->info("User retrieved by provider: {$user->email}");
                    $isValid = $provider->validateCredentials($user, $credentials);
                    $this->info("Manual validation result: " . ($isValid ? 'TRUE' : 'FALSE'));
                } else {
                    $this->error("Provider could not retrieve user");
                }
            }
            Auth::guard('admin')->logout();
        }
        
        return 0;
    }
}
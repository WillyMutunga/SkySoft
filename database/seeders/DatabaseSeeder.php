<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Inquiry;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create or update Administrator
        User::updateOrCreate(
            ['email' => 'wmutunga003@gmail.com'],
            [
                'name' => 'Willy Mutunga',
                'password' => Hash::make('William#20'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Seed Default Company Settings
        $defaultSettings = [
            'company_phone' => '+254 712 345 678',
            'company_whatsapp' => '254712345678',
            'company_email' => 'info@skysoftsystems.co.ke',
            'sales_email' => 'sales@skysoftsystems.co.ke',
            'office_address' => 'Nairobi, Kenya',
            'working_hours' => 'Mon - Sat: 8:00 AM - 6:00 PM',
            'tagline' => 'Smart IT Systems & Power Infrastructure Kenya',
            'facebook_url' => 'https://facebook.com',
            'linkedin_url' => 'https://linkedin.com',
            'twitter_url' => 'https://x.com',
        ];

        foreach ($defaultSettings as $key => $val) {
            Setting::updateOrCreate(['key' => $key], ['value' => $val, 'group' => 'general']);
        }

        // 3. Seed Initial Products
        $products = [
            [
                'name' => 'Smart Cloud POS All-in-One Touch Terminal',
                'slug' => 'smart-cloud-pos-all-in-one-terminal',
                'category' => 'Point of Sale (POS)',
                'badge' => 'Best Seller',
                'price' => 45000,
                'currency' => 'KES',
                'price_type' => 'starting_at',
                'short_description' => 'Compact touch terminal with built-in thermal printer, customer display, and automated M-Pesa integration.',
                'description' => 'The Smart Cloud POS Terminal is engineered for fast-paced retail stores, supermarkets, pharmacies, cafes, and hospitality businesses. Featuring high-speed quad-core processing, vibrant dual-touch screens, fast thermal receipt printing, and instantaneous M-Pesa STK Push integration. Seamlessly syncs with cloud analytics and works reliably even in offline network mode.',
                'features' => [
                    'Instant M-Pesa STK Push & Card Payment Integration',
                    'KRA eTIMS Compliant Electronic Invoicing',
                    'Real-Time Cloud Inventory & Multi-Branch Stock Tracking',
                    'Offline Mode Support with Automatic Cloud Sync',
                    'Built-in 80mm Auto-Cutter Thermal Printer',
                    'Comprehensive Sales, Profit, and Tax Reporting'
                ],
                'specs' => [
                    'Display' => '15.6" Capacitive Touch FHD + 10.1" Customer Screen',
                    'Processor' => 'Intel Core i5 / Quad Core High-Speed SoC',
                    'Memory & Storage' => '8GB RAM + 128GB High-Speed SSD',
                    'Connectivity' => 'Gigabit LAN, Dual-Band WiFi, Bluetooth, 6x USB, RJ11 Drawer',
                    'Operating System' => 'Windows 11 Pro / Android Enterprise POS Edition'
                ],
                'image_url' => 'https://images.unsplash.com/photo-1556742049-0a67e5572293?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'in_stock' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Complete Supermarket & Retail POS Hardware Bundle',
                'slug' => 'supermarket-retail-pos-hardware-bundle',
                'category' => 'Point of Sale (POS)',
                'badge' => 'Complete Kit',
                'price' => 78000,
                'currency' => 'KES',
                'price_type' => 'fixed',
                'short_description' => 'Heavy-duty checkout workstation including 2D omnidirectional barcode scanner, heavy cash drawer, and thermal printer.',
                'description' => 'A complete, enterprise-grade hardware and software package designed for high-traffic supermarkets, hardware stores, and wholesale counters. Built with industrial components to handle thousands of transactions daily without overheating or lag.',
                'features' => [
                    'Omnidirectional Hands-Free 2D Barcode Scanner (Reads phone screens & QR codes)',
                    'Heavy-Duty Steel Cash Drawer (5 Bill / 8 Coin slots with media slots)',
                    'High-Speed 80mm Receipt Printer (260mm/sec)',
                    'Customer Price Checker & Loyalty Card Module',
                    'Multi-User Shift Reconciliation & Fraud Prevention'
                ],
                'specs' => [
                    'Workstation' => 'Heavy Duty 15.6" All-in-One Touchscreen Countertop',
                    'Scanner' => '2D Image Omnidirectional Platform Barcode Reader',
                    'Drawer' => 'Reinforced Solid Steel with RJ11 Microswitch Trigger',
                    'Printer' => '80mm Thermal with Auto-Cutter & USB/LAN Interface'
                ],
                'image_url' => 'https://images.unsplash.com/photo-1556740758-90de374c12ad?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'in_stock' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Online Pure Sine Wave UPS (1KVA - 3KVA)',
                'slug' => 'online-pure-sine-wave-ups-1kva-3kva',
                'category' => 'Power Backup & UPS',
                'badge' => 'High Reliability',
                'price' => 28500,
                'currency' => 'KES',
                'price_type' => 'starting_at',
                'short_description' => 'Zero transfer time double-conversion UPS for servers, critical medical equipment, and server racks.',
                'description' => 'Protect your sensitive electronics and critical business servers against power surges, brownouts, voltage spikes, and sudden blackouts. Available in top international brands including Light Wave, Mercer, and APC with genuine long-life lead-acid and lithium battery packs.',
                'features' => [
                    'True Double-Conversion Online Topology (0ms Transfer Time)',
                    'Microprocessor Control for Guaranteed High Reliability',
                    'Wide Input Voltage Window (110V - 300V AC)',
                    'Smart LCD Screen Showing Real-Time Load & Battery Status',
                    'Generator Friendly with Automatic Frequency Detection',
                    'USB & RS232 Smart Management Port with Auto-Shutdown Software'
                ],
                'specs' => [
                    'Capacity Options' => '1000VA (900W) / 2000VA (1800W) / 3000VA (2700W)',
                    'Brands' => 'APC Smart-UPS, LightWave, Mercer, Eaton',
                    'Output Waveform' => 'Pure Sine Wave',
                    'Efficiency' => '>92% Online Mode, >97% ECO Mode',
                    'Warranty' => '2-Year Full Replacement Warranty'
                ],
                'image_url' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'in_stock' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Enterprise High-Capacity Rackmount UPS (6KVA - 10KVA)',
                'slug' => 'enterprise-rackmount-ups-6kva-10kva',
                'category' => 'Power Backup & UPS',
                'badge' => 'Enterprise',
                'price' => 145000,
                'currency' => 'KES',
                'price_type' => 'starting_at',
                'short_description' => 'Heavy-duty scalable power protection for full data center racks, hospital labs, and corporate server rooms.',
                'description' => 'Industrial-grade power protection delivering uninterrupted, clean power to enterprise server cabinets, telecom equipment, and mission-critical cloud infrastructure. Supports external battery bank expansion for prolonged multi-hour backup.',
                'features' => [
                    'Unity Power Factor (1.0 PF) for Maximum Active Power Output',
                    'Scalable External Battery Banks for Extended Runtime',
                    'SNMP Web Card Support for Remote Network Monitoring & Alerts',
                    'Emergency Power Off (EPO) Functionality',
                    'Hot-Swappable Battery Modules for Zero-Downtime Maintenance'
                ],
                'specs' => [
                    'Form Factor' => 'Rackmount 19" (3U/6U) or Tower Convertible',
                    'Capacity' => '6000VA / 6000W up to 10000VA / 10000W',
                    'Input Phase' => 'Single-Phase / Three-Phase Options',
                    'Network Card' => 'Gigabit SNMP/HTTP Network Management Included'
                ],
                'image_url' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=800&q=80',
                'is_featured' => false,
                'in_stock' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Next-Gen Cybersecurity & Unified Threat Management Gateway',
                'slug' => 'next-gen-cybersecurity-utm-firewall-gateway',
                'category' => 'Networking & Security',
                'badge' => 'Zero Trust',
                'price' => 65000,
                'currency' => 'KES',
                'price_type' => 'starting_at',
                'short_description' => 'Enterprise hardware firewall with AI threat detection, site-to-site IPsec VPN, and bandwidth throttling.',
                'description' => 'Guard your organization from ransomware, malware, phishing, and unauthorized network intrusions. Equipped with multi-WAN failover (Safaricom, Airtel, Fiber) to ensure uninterrupted internet uptime for corporate offices.',
                'features' => [
                    'Deep Packet Inspection & AI Intrusion Prevention (IPS/IDS)',
                    'Multi-WAN Auto Failover & Intelligent Bandwidth Load Balancing',
                    'Secure Remote Work VPN (IPSec, OpenVPN, WireGuard)',
                    'Application Filtering & Website Access Controls',
                    'Guest WiFi Captive Portal with Voucher & SMS Gateway'
                ],
                'specs' => [
                    'Throughput' => 'Up to 2.5 Gbps Firewall / 800 Mbps Threat Protection',
                    'Interfaces' => '4x Gigabit RJ45 + 2x 10G SFP+ Optical Ports',
                    'Concurrent Sessions' => '500,000+ Active Connections',
                    'Form Factor' => '1U Standard 19" Server Rackmount'
                ],
                'image_url' => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'in_stock' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Managed Gigabit PoE+ Enterprise Switch (24 / 48 Ports)',
                'slug' => 'managed-gigabit-poe-enterprise-switch',
                'category' => 'Networking & Security',
                'badge' => 'High Performance',
                'price' => 38000,
                'currency' => 'KES',
                'price_type' => 'starting_at',
                'short_description' => 'L2/L3 managed network switch powering IP cameras, access points, and VoIP desk phones.',
                'description' => 'High-performance network switches engineered for stable structured cabling backbones in offices, commercial plazas, and hotels. Features 802.3at/af Power over Ethernet with intelligent power budget management.',
                'features' => [
                    'Full Gigabit Ethernet with High Backplane Switching Capacity',
                    '370W / 740W High PoE Power Budget for Access Points & CCTV',
                    'VLAN Segmentation, QoS Traffic Prioritization & Port Security',
                    'Dual SFP Uplink Ports for Long-Distance Fiber Backhauls',
                    'Cloud & Web GUI Centralized Management'
                ],
                'specs' => [
                    'Ports' => '24x / 48x 10/100/1000 Mbps RJ45 PoE+ & 4x 10G SFP+',
                    'PoE Standards' => 'IEEE 802.3af (15.4W) / IEEE 802.3at (30W per port)',
                    'Switching Capacity' => '128 Gbps Non-Blocking'
                ],
                'image_url' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&w=800&q=80',
                'is_featured' => false,
                'in_stock' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'SkySoft School ERP & Academic Management System',
                'slug' => 'skysoft-school-erp-academic-management-system',
                'category' => 'Enterprise Software',
                'badge' => 'Cloud Hosted',
                'price' => null,
                'currency' => 'KES',
                'price_type' => 'custom_quote',
                'short_description' => 'Comprehensive CBC & 8-4-4 school management suite with automated fee billing, student portal, and SMS alerts.',
                'description' => 'A modern all-in-one digital school management platform built for Kenyan primary schools, secondary schools, colleges, and international academies. Automates student admissions, exam grading, report card generation, automated M-Pesa fee reconciliation, library management, and bulk parent SMS broadcast.',
                'features' => [
                    'CBC Assessment & Standard Grading with 1-Click Report Card Generation',
                    'Automated M-Pesa Paybill Fee Reconciliation & Payment Receipts',
                    'Parent & Student Self-Service Mobile Portal',
                    'Bulk SMS Alerts for Attendance, Fee Reminders, and Announcements',
                    'Teacher Timetable, Payroll, and Staff Attendance Tracking'
                ],
                'specs' => [
                    'Deployment' => 'Secure Cloud Hosted (99.9% Uptime) or On-Premise Local Server',
                    'Users' => 'Unlimited Students, Teachers, and Admin Accounts',
                    'Data Backup' => 'Automated Daily Encrypted Cloud Backups'
                ],
                'image_url' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'in_stock' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'AI Smart CCTV Surveillance & Biometric Time Attendance Kit',
                'slug' => 'ai-smart-cctv-biometric-attendance-kit',
                'category' => 'Security & Surveillance',
                'badge' => 'High Definition',
                'price' => 52000,
                'currency' => 'KES',
                'price_type' => 'starting_at',
                'short_description' => '8-Channel 4K NVR with AI human/vehicle detection color night vision cameras and facial biometric scanner.',
                'description' => 'Commercial security and staff attendance automation package. Protect premises 24/7 with full-color night vision cameras and keep track of staff working hours with facial recognition and fingerprint biometric clocking.',
                'features' => [
                    'Full HD Color Night Vision Cameras with Weatherproof IP67 Metal Housing',
                    'AI Human & Vehicle Motion Detection (Zero False Alarms)',
                    'Mobile Remote Live View & Instant Push Alerts on Android/iOS',
                    'Facial Recognition & Fingerprint Time Attendance Scanner',
                    'Automatic Export to Payroll Software'
                ],
                'specs' => [
                    'Cameras' => '4x to 16x 4K Ultra HD IP Dome / Bullet Cameras',
                    'Storage' => '2TB - 8TB Surveillance Grade Seagate SkyHawk HDD',
                    'Biometric' => 'Contactless Facial Recognition + Fingerprint + RFID Card'
                ],
                'image_url' => 'https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=800&q=80',
                'is_featured' => false,
                'in_stock' => true,
                'sort_order' => 8,
            ],
        ];

        foreach ($products as $prod) {
            Product::updateOrCreate(['slug' => $prod['slug']], $prod);
        }

        // 4. Seed Sample Inquiries
        if (Inquiry::count() === 0) {
            Inquiry::create([
                'name' => 'James Mwangi',
                'email' => 'james.mwangi@example.co.ke',
                'phone' => '+254 712 345 678',
                'company' => 'Mwangi Superstores Ltd',
                'subject' => 'Quote Request for 3 POS Terminals',
                'message' => 'Hello SkySoft Systems, we are opening a new supermarket branch in Westlands, Nairobi and need 3 complete checkout POS terminals with KRA eTIMS and M-Pesa integration. Please share an official quote and installation timeframe.',
                'status' => 'pending',
                'product_id' => 1,
            ]);
        }
    }
}

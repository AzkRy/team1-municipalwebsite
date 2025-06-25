-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2025 at 06:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `municipal_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(255) NOT NULL,
  `announcement_img` varchar(255) NOT NULL,
  `announcement_src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `building_permit`
--

CREATE TABLE `building_permit` (
  `building_id` int(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `tin` char(255) NOT NULL,
  `city_municipality` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `zip_code` char(255) NOT NULL,
  `address_details` text NOT NULL,
  `lot_num` varchar(255) NOT NULL,
  `blk_num` varchar(255) NOT NULL,
  `interior` varchar(255) NOT NULL,
  `loc_barangay` varchar(255) NOT NULL,
  `loc_city_municipality` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `floor_area` decimal(65,2) NOT NULL,
  `estimated_cost` decimal(65,2) NOT NULL,
  `duration_days` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `arch_name` varchar(255) NOT NULL,
  `arch_prc` varchar(255) NOT NULL,
  `arch_ptr` varchar(255) NOT NULL,
  `civil_name` varchar(255) NOT NULL,
  `civil_prc` varchar(255) NOT NULL,
  `civil_ptr` varchar(255) NOT NULL,
  `elec_name` varchar(255) NOT NULL,
  `elec_prc` varchar(255) NOT NULL,
  `elec_ptr` varchar(255) NOT NULL,
  `other_professionals` text DEFAULT NULL,
  `scope_of_work` text NOT NULL,
  `scope_other_specify` text DEFAULT NULL,
  `file_barangay_clearance` varchar(255) NOT NULL,
  `file_ctc_title` varchar(255) NOT NULL,
  `file_tax_receipt` varchar(255) NOT NULL,
  `file_fire_safety` varchar(255) NOT NULL,
  `file_build_plans` varchar(255) NOT NULL,
  `file_bill_materials` varchar(255) NOT NULL,
  `file_prcptr_id` varchar(255) NOT NULL,
  `file_zone_clearance` varchar(255) NOT NULL,
  `file_location_clearance` varchar(255) NOT NULL,
  `file_dole_compliance` varchar(255) NOT NULL,
  `file_environment_compliance` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_permit`
--

CREATE TABLE `business_permit` (
  `business_id` int(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `tin_num` char(255) NOT NULL,
  `city_municipal` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `zip_code` char(255) NOT NULL,
  `address_details` text NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_address` text NOT NULL,
  `nature_of_business` text NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `registration_date` date NOT NULL,
  `organization_type` enum('single-proprietorship','partnership','corporation','cooperative') NOT NULL,
  `business_category` enum('new','renewal','temporary','home-based','online') NOT NULL,
  `num_employees` int(11) NOT NULL,
  `num_branches` int(11) DEFAULT NULL,
  `opertation_start_date` date NOT NULL,
  `business_hours` varchar(255) NOT NULL,
  `products_services` text NOT NULL,
  `file_barangay_clearance` varchar(255) NOT NULL,
  `file_registration_cert` varchar(255) NOT NULL,
  `file_valid_id` varchar(255) NOT NULL,
  `file_proof_address` varchar(255) NOT NULL,
  `file_zoning_clearance` varchar(255) NOT NULL,
  `file_sanitary_permit` varchar(255) NOT NULL,
  `file_fire_cert` varchar(255) NOT NULL,
  `file_location_sketch` varchar(255) NOT NULL,
  `file_cedula` varchar(255) NOT NULL,
  `file_environmental_cert` varchar(255) NOT NULL,
  `file_other_permits` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `submission_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events_news`
--

CREATE TABLE `events_news` (
  `newsevent_id` int(255) NOT NULL,
  `newsevent_name` varchar(255) NOT NULL,
  `newsevent_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_permit`
--

CREATE TABLE `event_permit` (
  `event_id` int(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `event_date_start` date NOT NULL,
  `event_date_end` date NOT NULL,
  `event_time_start` time NOT NULL,
  `event_time_end` time NOT NULL,
  `expected_attendees` int(11) NOT NULL,
  `uses_public_road` enum('yes','no') NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_type_other` text DEFAULT NULL,
  `organizer_name` varchar(255) NOT NULL,
  `representative_name` varchar(255) NOT NULL,
  `representative_position` varchar(255) NOT NULL,
  `organizer_contact` varchar(255) NOT NULL,
  `organizer_email` varchar(255) NOT NULL,
  `organizer_address` text NOT NULL,
  `has_live_music` enum('yes','no') NOT NULL,
  `has_fireworks` enum('yes','no') NOT NULL,
  `has_food_stalls` enum('yes','no') NOT NULL,
  `has_security` enum('yes','no') NOT NULL,
  `security_agency` varchar(255) DEFAULT NULL,
  `serves_alcohol` enum('yes','no') NOT NULL,
  `additional_notes` text DEFAULT NULL,
  `file_barangay_clearance` varchar(255) NOT NULL,
  `file_letter_mayor` varchar(255) NOT NULL,
  `file_event_program` varchar(255) NOT NULL,
  `file_vicinity_map` varchar(255) NOT NULL,
  `file_sketch_plan` varchar(255) NOT NULL,
  `file_coord_proof` varchar(255) NOT NULL,
  `file_fire_security` varchar(255) NOT NULL,
  `file_noise_permit` varchar(255) NOT NULL,
  `file_business_permit` varchar(255) NOT NULL,
  `file_additional_permit` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_inquiries`
--

CREATE TABLE `feedback_inquiries` (
  `fi_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback_inquiries`
--

INSERT INTO `feedback_inquiries` (`fi_id`, `name`, `type`, `subject`, `message`) VALUES
(1, 'Maria', 'Feedback', 'Test', 'Good, working'),
(11, 'Turano', 'Feedback', 'Concern', 'Bat po ganun yung website nyu?'),
(12, 'Maria', 'Inquiry', 'How to', 'Paano ba to kasi?'),
(13, '', 'Inquiry', 'Where to', 'Yung application po na ito san po sya?');

-- --------------------------------------------------------

--
-- Table structure for table `headline_news`
--

CREATE TABLE `headline_news` (
  `headline_id` int(255) NOT NULL,
  `headline_img` varchar(255) NOT NULL,
  `headline_title` varchar(255) NOT NULL,
  `headline_date` date NOT NULL,
  `headline_source` varchar(255) NOT NULL,
  `headline_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `health_appointment`
--

CREATE TABLE `health_appointment` (
  `appointment_id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `sex` enum('male','female','other') NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `address_details` text NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `service_type` enum('general','dental','prenatal','pediatrics','mental') NOT NULL,
  `reason` text NOT NULL,
  `medical_history` text NOT NULL,
  `allergies` text NOT NULL,
  `emergency_name` varchar(255) NOT NULL,
  `emergency_contact` varchar(255) NOT NULL,
  `relevant_med_records` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latest_news`
--

CREATE TABLE `latest_news` (
  `latestnews_id` int(11) NOT NULL,
  `latestnews_img` varchar(255) NOT NULL,
  `latestnews_title` varchar(255) NOT NULL,
  `latestnews_date` date NOT NULL,
  `latestnews_source` varchar(255) NOT NULL,
  `latestnews_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_clearance`
--

CREATE TABLE `tax_clearance` (
  `tax_id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `address_details` text NOT NULL,
  `tax_type` enum('real','property','business') NOT NULL,
  `tin` char(255) NOT NULL,
  `registered_name` varchar(255) NOT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `tax_address` text NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `is_taxpayer` enum('yes','no') NOT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `authorization_letter` varchar(255) DEFAULT NULL,
  `purpose` text NOT NULL,
  `years_covered` varchar(255) NOT NULL,
  `additional_notes` text DEFAULT NULL,
  `valid_id` varchar(255) NOT NULL,
  `proof_of_payment` varchar(255) DEFAULT NULL,
  `contact_delivery` varchar(255) NOT NULL,
  `delivery_method` enum('pickup','office','email') NOT NULL,
  `status` varchar(255) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transparency`
--

CREATE TABLE `transparency` (
  `transparency_id` int(255) NOT NULL,
  `transparency_file` varchar(255) NOT NULL,
  `transparency_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport_permit`
--

CREATE TABLE `transport_permit` (
  `transport_id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `city_municipal` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `zip_code` char(255) NOT NULL,
  `address_details` text NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `plate_numbers` varchar(255) NOT NULL,
  `num_units` int(11) NOT NULL,
  `driver_names` varchar(255) NOT NULL,
  `license_numbers` varchar(255) NOT NULL,
  `transport_purpose` varchar(255) NOT NULL,
  `transport_date_start` date NOT NULL,
  `transport_date_end` date NOT NULL,
  `transport_time_start` time NOT NULL,
  `transport_time_end` time NOT NULL,
  `route_destination` text NOT NULL,
  `road_closure` enum('yes','no') NOT NULL,
  `additional_notes` text DEFAULT NULL,
  `file_barangay_clearance` varchar(255) NOT NULL,
  `file_vehicle_registration` varchar(255) NOT NULL,
  `file_drivers_license` varchar(255) NOT NULL,
  `file_letter_of_intent` varchar(255) NOT NULL,
  `file_zoning_clearance` varchar(255) NOT NULL,
  `file_traffic_plan` varchar(255) NOT NULL,
  `file_route_map` varchar(255) NOT NULL,
  `file_coordination_letter` varchar(255) NOT NULL,
  `file_business_permit` varchar(255) NOT NULL,
  `file_additional_permit` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `submission_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_management`
--

CREATE TABLE `user_management` (
  `um_id` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `employee_num` int(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_management`
--

INSERT INTO `user_management` (`um_id`, `role`, `last_name`, `first_name`, `email`, `employee_num`, `password`) VALUES
(1, 'Super Admin', 'Turano', 'Maria', 'maria@gmail.com', 123456, '$2y$10$gIXD/UM3z1da1FrJskahUO7EfbyVpRHanTo8seLMFa06wmNI6RCl2'),
(2, 'User Admin', 'Turano', 'Marinel', 'maria21@gmail.com', 123456, '$2y$10$4m8KYdEJ4Ri1zeBxtJz3N.vzKN64aNzV/Ym4K6BLwWWOQOvuy6HPC'),
(13, 'Media Officer', 'Torres', 'Noel', 'noeltorres@gmail.com', 456789, '$2y$10$6Eeu5mjv4JbGICPN2D3xjeBgaAN1fRs.yC1e4NzCKe2FY5GWixbcy'),
(14, 'Transparency Officer', 'Torres', 'Noel', 'noeltorres@gmail.com', 456789, '$2y$10$Etz8Jmcq34DSdkKoYozljOsTa/x43zkZvo/c8AYTO.ae1oVUnLffG'),
(15, 'Service Officer', 'Magpantay', 'Nathaniel', 'natmagpantay@gmail.com', 123987, '$2y$10$xx47R4zd3jg6dcr0nhwcDeBUsAO6JjWIV1J88Bh8DGKPeUAb2rmS2'),
(16, 'Super Admin', 'Balajadia', 'Margarita', 'marga@gmail.com', 654321, '$2y$10$I1o/3U2v7bUqU9DIedqqjOAImOwgAIFoKnp8O94a1sv8cDQ8UVjhm'),
(17, 'Information Officer', 'Esguerra', 'Gian', 'gianesguerra@gmail.com', 364482, '$2y$10$Z0FKK7EMX4RP2HFcc0dUrOJYARnrpcaGyqjcFh5wlAtn9oNKf8iS2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `building_permit`
--
ALTER TABLE `building_permit`
  ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `business_permit`
--
ALTER TABLE `business_permit`
  ADD PRIMARY KEY (`business_id`);

--
-- Indexes for table `events_news`
--
ALTER TABLE `events_news`
  ADD PRIMARY KEY (`newsevent_id`);

--
-- Indexes for table `event_permit`
--
ALTER TABLE `event_permit`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `feedback_inquiries`
--
ALTER TABLE `feedback_inquiries`
  ADD PRIMARY KEY (`fi_id`);

--
-- Indexes for table `headline_news`
--
ALTER TABLE `headline_news`
  ADD PRIMARY KEY (`headline_id`);

--
-- Indexes for table `health_appointment`
--
ALTER TABLE `health_appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `latest_news`
--
ALTER TABLE `latest_news`
  ADD PRIMARY KEY (`latestnews_id`);

--
-- Indexes for table `tax_clearance`
--
ALTER TABLE `tax_clearance`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `transparency`
--
ALTER TABLE `transparency`
  ADD PRIMARY KEY (`transparency_id`);

--
-- Indexes for table `transport_permit`
--
ALTER TABLE `transport_permit`
  ADD PRIMARY KEY (`transport_id`);

--
-- Indexes for table `user_management`
--
ALTER TABLE `user_management`
  ADD PRIMARY KEY (`um_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `building_permit`
--
ALTER TABLE `building_permit`
  MODIFY `building_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_permit`
--
ALTER TABLE `business_permit`
  MODIFY `business_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events_news`
--
ALTER TABLE `events_news`
  MODIFY `newsevent_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_permit`
--
ALTER TABLE `event_permit`
  MODIFY `event_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback_inquiries`
--
ALTER TABLE `feedback_inquiries`
  MODIFY `fi_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `headline_news`
--
ALTER TABLE `headline_news`
  MODIFY `headline_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_appointment`
--
ALTER TABLE `health_appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `latest_news`
--
ALTER TABLE `latest_news`
  MODIFY `latestnews_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_clearance`
--
ALTER TABLE `tax_clearance`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transparency`
--
ALTER TABLE `transparency`
  MODIFY `transparency_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_permit`
--
ALTER TABLE `transport_permit`
  MODIFY `transport_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_management`
--
ALTER TABLE `user_management`
  MODIFY `um_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2020 at 11:29 AM
-- Server version: 10.3.22-MariaDB-0+deb10u1
-- PHP Version: 7.3.11-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakjiddat_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_access_data`
--

CREATE TABLE `pakphp_access_data` (
  `id` int(11) NOT NULL,
  `url` mediumtext NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `time_taken` float NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `site_url` varchar(255) DEFAULT NULL,
  `created_on` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_bank_statements`
--

CREATE TABLE `pakphp_bank_statements` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `closing_balance` varchar(255) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_billing`
--

CREATE TABLE `pakphp_billing` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `hours` float NOT NULL,
  `description` text NOT NULL,
  `notes` text NOT NULL,
  `payed` enum('No','Yes') NOT NULL,
  `date` date NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_cached_data`
--

CREATE TABLE `pakphp_cached_data` (
  `id` int(11) NOT NULL,
  `function_name` varchar(255) NOT NULL,
  `function_parameters` longtext NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `data` longtext NOT NULL,
  `created_on` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_checklists`
--

CREATE TABLE `pakphp_checklists` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_type` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `position` tinyint(4) NOT NULL,
  `text` text NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_customers`
--

CREATE TABLE `pakphp_customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment_rate` varchar(50) NOT NULL,
  `exchange_rate` int(11) NOT NULL,
  `billing_amount` int(11) NOT NULL,
  `account_information` longtext NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_error_data`
--

CREATE TABLE `pakphp_error_data` (
  `id` int(11) NOT NULL,
  `error_level` varchar(50) NOT NULL,
  `error_type` enum('Error','Exception') NOT NULL,
  `error_message` longtext NOT NULL,
  `error_file` mediumtext NOT NULL,
  `error_line` varchar(15) NOT NULL,
  `error_details` longtext NOT NULL,
  `server_data` longtext NOT NULL,
  `mysql_query_log` longtext NOT NULL,
  `error_html` longtext NOT NULL,
  `application_name` varchar(255) NOT NULL,
  `created_on` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_goals`
--

CREATE TABLE `pakphp_goals` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` enum('To Do','In Progress','Done') NOT NULL,
  `type` enum('Short List','Future Work','Idea','To Do') NOT NULL,
  `priority` enum('1','2','3','4','5') NOT NULL,
  `notes` longtext NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_income`
--

CREATE TABLE `pakphp_income` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_loans`
--

CREATE TABLE `pakphp_loans` (
  `id` int(11) NOT NULL,
  `borrower` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `notes` text NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_products_services`
--

CREATE TABLE `pakphp_products_services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('Product','Service') NOT NULL,
  `description` text NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_projects`
--

CREATE TABLE `pakphp_projects` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `archived` enum('no','yes') NOT NULL,
  `description` text NOT NULL,
  `notes` longtext NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_tasks`
--

CREATE TABLE `pakphp_tasks` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `estimated_completion_date` date NOT NULL,
  `status` enum('New','In Progress','Testing','Informed','Closed') NOT NULL,
  `type` enum('Bug','New Feature','Testing','Research') NOT NULL,
  `notes` longtext NOT NULL,
  `links` longtext NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_test_data`
--

CREATE TABLE `pakphp_test_data` (
  `id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `controller` varchar(255) NOT NULL,
  `object_name` varchar(255) NOT NULL,
  `function_type` varchar(20) NOT NULL,
  `function_name` varchar(255) NOT NULL,
  `function_parameters` longtext NOT NULL,
  `application_name` varchar(255) NOT NULL,
  `test_type` enum('unit','functional') NOT NULL,
  `created_on` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_test_details`
--

CREATE TABLE `pakphp_test_details` (
  `id` int(11) NOT NULL,
  `function_name` varchar(100) NOT NULL,
  `function_parameters` longtext NOT NULL,
  `sql_queries` longtext NOT NULL COMMENT 'the list of sql queries',
  `sql_query_count` int(11) NOT NULL COMMENT 'the number of sql queries run',
  `time_taken` float NOT NULL COMMENT 'the time taken in seconds to run the function',
  `memory_delta` float NOT NULL COMMENT 'the memory usage in Mb',
  `included_files` longtext NOT NULL COMMENT 'the list of included files',
  `included_files_count` int(11) NOT NULL COMMENT 'the number of included files',
  `application_name` varchar(255) NOT NULL,
  `test_type` enum('unit','functional') NOT NULL,
  `created_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_test_results`
--

CREATE TABLE `pakphp_test_results` (
  `id` int(11) NOT NULL,
  `application` varchar(255) NOT NULL,
  `test_type` enum('Functional','Unit') NOT NULL,
  `results` longtext NOT NULL,
  `time_taken` int(11) NOT NULL,
  `created_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_test_trace`
--

CREATE TABLE `pakphp_test_trace` (
  `id` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `function` varchar(255) NOT NULL,
  `test_type` int(50) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `line_number` int(11) NOT NULL,
  `cpu` float NOT NULL,
  `memory` int(11) NOT NULL,
  `created_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_time_tracking`
--

CREATE TABLE `pakphp_time_tracking` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `title` enum('Publish Blog Post','Data Entry','Online Correspondance','Documentation','Word Processing','Participation in Online Forum','In Person Meeting','Coding','Bug Fixing','Software Installation and Configuration','Testing','Social Media and Email Management','Research','Software Deployment','Laptop Administration','Server Administration','Website Maintenance','Graphics','Online Learning','Submit Project Proposals','Website Optimization') NOT NULL,
  `start` datetime NOT NULL,
  `time_taken` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakphp_users`
--

CREATE TABLE `pakphp_users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pakphp_access_data`
--
ALTER TABLE `pakphp_access_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakphp_bank_statements`
--
ALTER TABLE `pakphp_bank_statements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakphp_billing`
--
ALTER TABLE `pakphp_billing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `pakphp_cached_data`
--
ALTER TABLE `pakphp_cached_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakphp_checklists`
--
ALTER TABLE `pakphp_checklists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_id_2` (`item_id`,`position`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `pakphp_customers`
--
ALTER TABLE `pakphp_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakphp_error_data`
--
ALTER TABLE `pakphp_error_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakphp_goals`
--
ALTER TABLE `pakphp_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakphp_income`
--
ALTER TABLE `pakphp_income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `pakphp_loans`
--
ALTER TABLE `pakphp_loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakphp_products_services`
--
ALTER TABLE `pakphp_products_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakphp_projects`
--
ALTER TABLE `pakphp_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `pakphp_tasks`
--
ALTER TABLE `pakphp_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `pakphp_test_data`
--
ALTER TABLE `pakphp_test_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakphp_test_details`
--
ALTER TABLE `pakphp_test_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakphp_test_results`
--
ALTER TABLE `pakphp_test_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakphp_test_trace`
--
ALTER TABLE `pakphp_test_trace`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakphp_time_tracking`
--
ALTER TABLE `pakphp_time_tracking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `pakphp_users`
--
ALTER TABLE `pakphp_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pakphp_access_data`
--
ALTER TABLE `pakphp_access_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_bank_statements`
--
ALTER TABLE `pakphp_bank_statements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_billing`
--
ALTER TABLE `pakphp_billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_cached_data`
--
ALTER TABLE `pakphp_cached_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_checklists`
--
ALTER TABLE `pakphp_checklists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_customers`
--
ALTER TABLE `pakphp_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_error_data`
--
ALTER TABLE `pakphp_error_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_goals`
--
ALTER TABLE `pakphp_goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_income`
--
ALTER TABLE `pakphp_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_loans`
--
ALTER TABLE `pakphp_loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_products_services`
--
ALTER TABLE `pakphp_products_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_projects`
--
ALTER TABLE `pakphp_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_tasks`
--
ALTER TABLE `pakphp_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_test_data`
--
ALTER TABLE `pakphp_test_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_test_details`
--
ALTER TABLE `pakphp_test_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_test_results`
--
ALTER TABLE `pakphp_test_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_test_trace`
--
ALTER TABLE `pakphp_test_trace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_time_tracking`
--
ALTER TABLE `pakphp_time_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pakphp_users`
--
ALTER TABLE `pakphp_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pakphp_billing`
--
ALTER TABLE `pakphp_billing`
  ADD CONSTRAINT `customer-billing` FOREIGN KEY (`customer_id`) REFERENCES `pakphp_customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pakphp_checklists`
--
ALTER TABLE `pakphp_checklists`
  ADD CONSTRAINT `task-checklist` FOREIGN KEY (`item_id`) REFERENCES `pakphp_tasks` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pakphp_income`
--
ALTER TABLE `pakphp_income`
  ADD CONSTRAINT `customer-income` FOREIGN KEY (`customer_id`) REFERENCES `pakphp_customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pakphp_projects`
--
ALTER TABLE `pakphp_projects`
  ADD CONSTRAINT `customers-projects` FOREIGN KEY (`customer_id`) REFERENCES `pakphp_customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pakphp_tasks`
--
ALTER TABLE `pakphp_tasks`
  ADD CONSTRAINT `projects-tasks` FOREIGN KEY (`project_id`) REFERENCES `pakphp_projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pakphp_time_tracking`
--
ALTER TABLE `pakphp_time_tracking`
  ADD CONSTRAINT `task-time-tracking` FOREIGN KEY (`task_id`) REFERENCES `pakphp_tasks` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2021 m. Bir 11 d. 02:47
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garage_db`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `toll_free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_preference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_charge_base` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_product_default` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_list_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_cost_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_list_minus_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_a_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_b_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_c_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_d_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_e_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_charge_base` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_pricing_by_task` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calculation_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_labor_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_po_markup_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_charge_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_cost_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments_language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments_instructions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_limit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_disc_due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_exported` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accounting_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `customers`
--

INSERT INTO `customers` (`id`, `company`, `name`, `address`, `city`, `postal_code`, `country`, `province`, `email`, `telephone`, `extension`, `toll_free`, `fax`, `alt_telephone`, `alt_extension`, `license`, `credit_customer`, `customer_type`, `contact_preference`, `part_charge_base`, `part_product_default`, `part_list_percentage`, `part_cost_percentage`, `part_list_minus_percentage`, `part_a_percentage`, `part_b_percentage`, `part_c_percentage`, `part_d_percentage`, `part_e_percentage`, `task_charge_base`, `customer_pricing_by_task`, `calculation_type`, `task_labor_rate`, `task_po_markup_percentage`, `shop_charge_percentage`, `shop_cost_percentage`, `comments_language`, `comments_instructions`, `tax_code`, `tax_id`, `credit_limit`, `terms_balance`, `terms_disc_due`, `terms_payment`, `date_exported`, `discount_percentage`, `monthly_charge`, `accounting_id`, `created_at`, `updated_at`) VALUES
(2, 'Toilet Paper UC', 'Lašaras Aras', 'Grūdų g.', 'Kalafior', 'US112', 'Unknown', 'NA', 'lasaras@gmail.com', '62222222', '+370', 'Yes arba No', 'N/A', NULL, '+370', 'Grybų distribucijos licencija', 'yes', '1', '1', '1', '10.00', '2000.00', '20.00', '10.00', '150.00', '100.00', '30.00', '25.00', '35.00', NULL, NULL, '1', '100.00', '10.00', '12.00', '12.00', '3', 'Shibidibubai', 'None', '911', '5.000.000 USD', 'None', '2021-06-24', 'None', '2021-07-24', '10.00', '120.00', '69', '2021-05-24 16:53:28', '2021-06-07 10:04:27');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `events`
--

INSERT INTO `events` (`id`, `date`, `description`, `time_from`, `time_to`, `created_at`, `updated_at`) VALUES
(2, '2021-05-03', 'Bybiene', '10:00:00', '11:00:00', '2021-05-01 00:00:32', '2021-05-01 01:12:52'),
(4, '2021-05-02', 'Christmas', NULL, NULL, '2021-05-01 01:25:43', '2021-05-01 01:25:43');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_25_165821_create_permission_tables', 2),
(5, '2021_03_26_121825_create_parts_table', 3),
(6, '2021_03_31_110929_create_suppliers_table', 4),
(7, '2021_05_01_023515_create_calendar_table', 5),
(8, '2021_05_01_023515_create_events_table', 6),
(9, '2021_05_07_194133_create_customers_table', 7),
(10, '2021_06_07_161433_create_invoices_table', 8),
(11, '2021_06_07_161456_create_parts_orders_table', 8),
(12, '2021_06_07_162223_create_model_has_invoices', 9),
(13, '2021_06_07_162318_create_invoices_table', 10),
(14, '2021_06_07_161456_create_part_orders_table', 11),
(15, '2021_06_07_161456_create_part__orders_table', 12);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `model_has_invoices`
--

CREATE TABLE `model_has_invoices` (
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 13),
(4, 'App\\Models\\User', 9),
(4, 'App\\Models\\User', 10);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `parts`
--

CREATE TABLE `parts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bar_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_hand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pictures` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoices` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_interval` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prices` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `garage_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `product_no` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_qty` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_cost` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_rec` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_rec_today` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_cost_today` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_rec` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_return` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructions` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `parts`
--

INSERT INTO `parts` (`id`, `code`, `bar_code`, `category`, `type`, `location`, `on_hand`, `price`, `supplier_id`, `qty`, `model`, `make`, `style`, `pictures`, `invoices`, `warranty_time`, `warranty_interval`, `prices`, `discount`, `description`, `garage_location`, `status`, `product_no`, `order_qty`, `unit_cost`, `cost`, `qty_rec`, `qty_rec_today`, `unit_cost_today`, `date_rec`, `qty_return`, `instructions`, `created_at`, `updated_at`) VALUES
(4, 'code', NULL, 'category', NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'desc', 'garage_location', 2, 'product_no', 'order_qty', 'unit_cost', 'cost', 'qty_rec', 'qty_rec_today', NULL, 'date_rec', 'qty_return', 'instructions', '2021-04-25 18:20:20', '2021-04-25 18:20:20'),
(7, '1148', NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Wheels 20\"', NULL, 1, '77XX1', '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Available from 10 AM to 8 PM, Monday to Friday.', '2021-04-26 16:59:01', '2021-04-26 16:59:01'),
(8, '1149', NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tires 19\"', NULL, 1, '77XX2', '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Available from 10 AM to 8 PM, Monday to Friday.', '2021-04-26 16:59:01', '2021-04-26 16:59:01'),
(9, '1150', NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bolts', NULL, 1, '77XX3', '1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Available from 10 AM to 8 PM, Monday to Friday.', '2021-04-26 16:59:01', '2021-04-26 16:59:01');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `part__orders`
--

CREATE TABLE `part__orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bar_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_hand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pictures` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoices` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_interval` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prices` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `garage_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `product_no` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_qty` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_cost` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_rec` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_rec_today` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_cost_today` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_rec` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_return` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructions` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `part__orders`
--

INSERT INTO `part__orders` (`id`, `code`, `bar_code`, `category`, `type`, `location`, `on_hand`, `price`, `supplier_id`, `qty`, `model`, `make`, `style`, `pictures`, `invoices`, `warranty_time`, `warranty_interval`, `prices`, `discount`, `description`, `garage_location`, `status`, `product_no`, `order_qty`, `unit_cost`, `cost`, `qty_rec`, `qty_rec_today`, `unit_cost_today`, `date_rec`, `qty_return`, `instructions`, `order_status`, `order_id`, `created_at`, `updated_at`) VALUES
(3, '1149', NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tires 19', NULL, 1, '77XX2', '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Available from 10 AM to 8 PM, Monday to Friday.', '0', 'UpDNFGmqi8Pm', '2021-06-10 11:46:31', '2021-06-10 11:46:31'),
(4, '1165', NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Batonas', NULL, 1, '88xX9', '5', '0.40', '2.00', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'UpDNFGmqi8Pm', '2021-06-10 11:46:31', '2021-06-10 11:46:31');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'everything', 'web', '2021-03-06 16:34:08', '2021-03-06 16:34:08'),
(3, 'users.management.view', 'web', '2021-03-08 15:56:23', '2021-03-08 15:56:23'),
(4, 'users.management.access', 'web', '2021-03-08 15:56:39', '2021-03-08 15:56:39'),
(5, 'users.management.edit', 'web', '2021-03-08 15:56:49', '2021-03-08 15:56:49'),
(6, 'users.management.delete', 'web', '2021-03-08 15:56:59', '2021-03-08 15:56:59'),
(8, 'roles.management.access', 'web', '2021-03-11 10:11:50', '2021-03-11 10:11:50'),
(9, 'roles.management.view', 'web', '2021-03-11 10:11:55', '2021-03-11 10:11:55'),
(10, 'roles.management.edit', 'web', '2021-03-11 10:12:00', '2021-03-11 10:12:00'),
(11, 'roles.management.delete', 'web', '2021-03-11 10:12:05', '2021-03-11 10:12:05'),
(12, 'permissions.management.access', 'web', '2021-03-12 16:33:09', '2021-03-12 16:33:09'),
(13, 'permissions.management.view', 'web', '2021-03-12 16:33:22', '2021-03-12 16:33:22'),
(16, 'suppliers.management.view', 'web', '2021-04-25 15:00:58', '2021-04-25 15:00:58'),
(17, 'suppliers.management.access', 'web', '2021-04-25 15:01:04', '2021-04-25 15:01:04'),
(18, 'suppliers.management.edit', 'web', '2021-04-25 15:01:11', '2021-04-25 15:01:11'),
(19, 'suppliers.management.delete', 'web', '2021-04-25 15:01:25', '2021-04-25 15:01:25'),
(20, 'parts.view', 'web', '2021-04-27 19:19:59', '2021-04-27 19:19:59'),
(21, 'parts.access', 'web', '2021-04-27 19:20:04', '2021-04-27 19:20:04'),
(22, 'parts.create', 'web', '2021-04-27 19:20:14', '2021-04-27 19:20:14'),
(23, 'parts.edit', 'web', '2021-04-27 19:20:21', '2021-04-27 19:20:21'),
(24, 'parts.delete', 'web', '2021-04-27 19:20:25', '2021-04-27 19:20:25'),
(25, 'suppliers.management.create', 'web', '2021-04-27 19:37:02', '2021-04-27 19:37:02'),
(26, 'users.management.create', 'web', '2021-04-27 19:38:31', '2021-04-27 19:38:31'),
(27, 'roles.management.create', 'web', '2021-04-27 19:40:29', '2021-04-27 19:40:29'),
(28, 'calendar.create', 'web', '2021-04-27 20:08:41', '2021-04-27 20:08:41'),
(29, 'calendar.delete', 'web', '2021-04-27 20:08:46', '2021-04-27 20:08:46'),
(30, 'calendar.view', 'web', '2021-04-27 20:08:51', '2021-04-27 20:08:51'),
(31, 'customers.view', 'web', '2021-05-24 18:57:59', '2021-05-24 18:57:59'),
(32, 'customers.edit', 'web', '2021-05-24 18:58:05', '2021-05-24 18:58:05'),
(33, 'customers.delete', 'web', '2021-05-24 18:58:12', '2021-05-24 18:58:12');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'web', '2021-03-06 16:34:08', '2021-05-01 00:50:21'),
(4, 'Supplier', 'web', '2021-03-26 19:02:51', '2021-03-26 19:02:51');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(21, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_toll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_alt_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_toll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_alt_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_contacts_names` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_contacts_emails` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_contacts_phones` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_contacts_faxes` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `supplier_company`, `supplier_city`, `supplier_state`, `supplier_address`, `supplier_post`, `supplier_email`, `supplier_telephone`, `supplier_fax`, `supplier_toll`, `supplier_alt_phone`, `billing_city`, `billing_state`, `billing_address`, `billing_post`, `billing_email`, `billing_telephone`, `billing_fax`, `billing_toll`, `billing_alt_phone`, `alt_contacts_names`, `alt_contacts_emails`, `alt_contacts_phones`, `alt_contacts_faxes`, `comments`, `created_at`, `updated_at`) VALUES
(5, 'bla', 'Company BLA', 'bla', 'bla', 'bla', 'bla', 'tomas.balciunass11@gmail.com', 'bla', 'bla', 'bla', 'bla', 'bla', 'bla', 'bla', 'bla', 'tomas.balciunass11@gmail.com', 'bla', 'bla', 'bla', 'bla', '[\"Jonas\",\"Iskrypelis\"]', '[\"codet.help@gmail.com\",\"maeqhenry@gmail.com\"]', '[\"+37060385477\",\"+37061481524\"]', '[\"nope1\",\"nope\"]', 'blablablablablablablabla', '2021-04-21 13:24:49', '2021-04-25 17:55:41');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `date_of_birth`, `remember_token`, `created_at`, `updated_at`, `phone`) VALUES
(1, 'Tom', 'Ba', 'tom@gg.lt', NULL, '$2y$10$rJt7b0ryqdkdsBF7./VPP.MQlz1GYqsLb1f07rhVTFD/6zrP4NTxe', '2014-01-01', NULL, '2021-02-22 22:00:00', '2021-02-27 21:17:58', NULL),
(9, 'Joe', 'Gaiden', 'joe@bid.com', NULL, '$2y$10$oLlIFIkoQf3Lfa0LJiVPLORmhoTHEpWHtcb1h3NnAb1yf7Zwj3MaS', '2021-02-03', NULL, '2021-02-27 20:17:14', '2021-02-27 20:17:14', NULL),
(10, 'Babatrynis', 'Lyris', 'dusk@go.lt', NULL, '$2y$10$5wFvIA2dXUXYEt9XHRJOUuMNAJxqFhVfgpLCIudoHUAUqD4ID08D6', '2021-03-24', NULL, '2021-03-11 10:07:56', '2021-03-11 10:07:56', NULL),
(13, 'Johnatan', 'Garbageman', 'john@ggs.lt', NULL, '$2y$10$AYKWh6Y7Z6qCbXASeoRuwOAsFhXevRgp6hJOYdNEf6eKMyRznuD3a', '1995-02-24', NULL, '2021-03-30 14:42:49', '2021-03-30 14:42:49', '+1477546512');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part__orders`
--
ALTER TABLE `part__orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `part__orders`
--
ALTER TABLE `part__orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Apribojimai lentelei `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

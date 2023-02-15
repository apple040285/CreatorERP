<?php

namespace App\Enum;

enum PermissionNames: string
{
    /**
     * 帳號管理
     */
    case 帳號管理       = 'admins';
    case 查看帳號       = 'admins.read';
    case 新增帳號       = 'admins.add';
    case 編輯帳號       = 'admins.update';
    case 刪除帳號       = 'admins.delete';

    /**
     * 角色管理
     */
    case 角色管理       = 'roles';
    case 查看角色       = 'roles.read';
    case 新增角色       = 'roles.add';
    case 編輯角色       = 'roles.update';
    case 刪除角色       = 'roles.delete';

    /**
     * 部門管理
     */
    case 部門管理       = 'departments';
    case 查看部門       = 'departments.read';
    case 新增部門       = 'departments.add';
    case 編輯部門       = 'departments.update';
    case 刪除部門       = 'departments.delete';

    /**
     * 職位管理
     */
    case 職位管理       = 'jobs';
    case 查看職位       = 'jobs.read';
    case 新增職位       = 'jobs.add';
    case 編輯職位       = 'jobs.update';
    case 刪除職位       = 'jobs.delete';

    /**
     * 幣值管理
     */
    case 幣值管理       = 'currencies';
    case 查看幣值       = 'currencies.read';
    case 新增幣值       = 'currencies.add';
    case 編輯幣值       = 'currencies.update';
    case 刪除幣值       = 'currencies.delete';

    /**
     * 專案管理
     */
    case 專案管理       = 'projects';
    case 查看專案       = 'projects.read';
    case 新增專案       = 'projects.add';
    case 編輯專案       = 'projects.update';
    case 刪除專案       = 'projects.delete';

    /**
     * 銀行管理
     */
    case 銀行管理       = 'banks';
    case 查看銀行       = 'banks.read';
    case 新增銀行       = 'banks.add';
    case 編輯銀行       = 'banks.update';
    case 刪除銀行       = 'banks.delete';

    /**
     * 人員管理
     */
    case 人員管理       = 'staffs';
    case 查看人員       = 'staffs.read';
    case 新增人員       = 'staffs.add';
    case 編輯人員       = 'staffs.update';
    case 刪除人員       = 'staffs.delete';

    /**
     * 帳戶管理
     */
    case 帳戶管理       = 'bank_accounts';
    case 查看帳戶       = 'bank_accounts.read';
    case 新增帳戶       = 'bank_accounts.add';
    case 編輯帳戶       = 'bank_accounts.update';
    case 刪除帳戶       = 'bank_accounts.delete';

    /**
     * 產品分類
     */
    case 產品分類管理       = 'categories';
    case 查看產品分類       = 'categories.read';
    case 新增產品分類       = 'categories.add';
    case 編輯產品分類       = 'categories.update';
    case 刪除產品分類       = 'categories.delete';

    /**
     * 產品管理
     */
    case 產品管理       = 'products';
    case 查看產品       = 'products.read';
    case 新增產品       = 'products.add';
    case 編輯產品       = 'products.update';
    case 刪除產品       = 'products.delete';

    /**
     * 倉庫管理
     */
    case 倉庫管理       = 'storehouses';
    case 查看倉庫       = 'storehouses.read';
    case 新增倉庫       = 'storehouses.add';
    case 編輯倉庫       = 'storehouses.update';
    case 刪除倉庫       = 'storehouses.delete';

    /**
     * 客戶廠商類型
     */
    case 客戶廠商類型管理       = 'customer_manufacturer_categories';
    case 查看客戶廠商類型       = 'customer_manufacturer_categories.read';
    case 新增客戶廠商類型       = 'customer_manufacturer_categories.add';
    case 編輯客戶廠商類型       = 'customer_manufacturer_categories.update';
    case 刪除客戶廠商類型       = 'customer_manufacturer_categories.delete';

    /**
     * 客戶廠商
     */
    case 客戶廠商管理       = 'customer_manufacturers';
    case 查看客戶廠商       = 'customer_manufacturers.read';
    case 新增客戶廠商       = 'customer_manufacturers.add';
    case 編輯客戶廠商       = 'customer_manufacturers.update';
    case 刪除客戶廠商       = 'customer_manufacturers.delete';

    /**
     訂單類
     */

    /**
     * 採購作業
     */
    case 採購作業管理       = 'procurement_order';
    case 查看採購作業       = 'procurement_order.read';
    case 新增採購作業       = 'procurement_order.add';
    case 編輯採購作業       = 'procurement_order.update';
    case 刪除採購作業       = 'procurement_order.delete';

    /**
     * 進貨作業
     */
    case 進貨作業管理       = 'purchase_order';
    case 查看進貨作業       = 'purchase_order.read';
    case 新增進貨作業       = 'purchase_order.add';
    case 編輯進貨作業       = 'purchase_order.update';
    case 刪除進貨作業       = 'purchase_order.delete';

    /**
     * 訂購作業
     */
    case 訂購作業管理       = 'place_order';
    case 查看訂購作業       = 'place_order.read';
    case 新增訂購作業       = 'place_order.add';
    case 編輯訂購作業       = 'place_order.update';
    case 刪除訂購作業       = 'place_order.delete';

    /**
     * 銷貨作業
     */
    case 銷貨作業管理       = 'sales_order';
    case 查看銷貨作業       = 'sales_order.read';
    case 新增銷貨作業       = 'sales_order.add';
    case 編輯銷貨作業       = 'sales_order.update';
    case 刪除銷貨作業       = 'sales_order.delete';

    /**
     * 調撥作業
     */
    case 調撥作業管理       = 'adjust_order';
    case 查看調撥作業       = 'adjust_order.read';
    case 新增調撥作業       = 'adjust_order.add';
    case 編輯調撥作業       = 'adjust_order.update';
    case 刪除調撥作業       = 'adjust_order.delete';
}

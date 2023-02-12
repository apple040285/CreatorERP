<?php

namespace App\Enum;

enum PermissionName: string
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
     * 代理管理
     */
    case 代理管理       = 'agents';

    /** 經紀管理 */
    case 經紀管理       = 'agents.broker';
    case 查看經紀       = 'agents.broker.read';
    case 新增經紀       = 'agents.broker.add';
    case 編輯經紀       = 'agents.broker.update';
    case 刪除經紀       = 'agents.broker.delete';
    case 經紀報表       = 'agents.broker.report';
    case 導出經紀報表   = 'agents.broker.export';

    /** 運營管理 */
    case 運營管理       = 'agents.manager';
    case 查看運營       = 'agents.manager.read';
    case 新增運營       = 'agents.manager.add';
    case 編輯運營       = 'agents.manager.update';
    case 刪除運營       = 'agents.manager.delete';
    case 運營報表       = 'agents.manager.report';
    case 導出運營報表   = 'agents.manager.export';

    /**
     * 賣家管理
     */
    case 賣家管理       = 'sellers';
    case 查看賣家       = 'sellers.read';
    case 賣家成本       = 'sellers.read.cost';
    case 新增賣家       = 'sellers.add';
    case 編輯賣家       = 'sellers.update';
    case 刪除賣家       = 'sellers.delete';
    case 賣家報表       = 'sellers.report';
    case 導出賣家報表   = 'sellers.export';

    /**
     * 訂單管理
     */
    case 訂單管理       = 'orders';
    case 查看訂單       = 'orders.read';
    case 新增訂單       = 'orders.add';
    case 編輯訂單       = 'orders.update';
    case 刪除訂單       = 'orders.delete';

    /**
     * 產品管理
     */
    case 產品管理       = 'products';
    case 查看產品       = 'products.read';
    case 新增產品       = 'products.add';
    case 編輯產品       = 'products.update';
    case 刪除產品       = 'products.delete';
}

<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');
    if (!isset($config))
    {
        $config = array();
    }

    $config['datatable_class'] = "dyntable table dt-responsive nowrap dataTable no-footer dtr-inline";


    $config['category_list_headers'] = array(
        'category_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'category_name',
        ),
        'action' => array(
            'isSortable' => FALSE,
            'jsonField' => 'category_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'category',
            'callBackFunction' => array('get_delete_link','get_edit_link'),          
        ),
    );

    $config['users_listing_headers'] = array(
        'ufname' => array(
            'isSortable' => TRUE,
            'jsonField' => 'ufname',
            'width' => '20%'
        ),
        'ulname' => array(
            'isSortable' => TRUE,
            'jsonField' => 'ulname',
            'width' => '20%'
        ),
        'username' => array(
            'isSortable' => TRUE,
            'jsonField' => 'username',
            'width' => '20%'
        ),
        'user_type' => array(
            'isSortable' => TRUE,
            'jsonField' => 'user_type',
            'width' => '20%'
        ),
        'status' => array(
            'jsonField' => 'status',
            'isSortable' => TRUE,
           
            'width' => '12%',
            'align' => 'left'
        ),
        'action' => array(
            'isSortable' => FALSE,
            'jsonField' => 'id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'users',
            'callBackFunction' => array('get_delete_link','get_edit_link'),          
        ),
    );



    $config['strap_material_listing_headers'] = array(
        'strap_material_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'strap_material_name',
            'width' => '90%'
        ),
        'edit' => array(
            'isSortable' => FALSE,
            'jsonField' => 'strap_material_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'strap_material',
            'callBackFunction' => 'get_edit_link',
            'width' => '1%'
        ),
        'delete' => array(
            'isSortable' => FALSE,
            'jsonField' => 'strap_material_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'strap_material',
            'callBackFunction' => 'get_delete_link',
            'width' => '1%'
        )
    );

    $config['currency_listing_headers'] = array(
        'currency_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'currency_name',
            'width' => '60%'
        ),
        'short_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'short_name',
            'width' => '15%'
        ),
        'currency_symbol' => array(
            'isSortable' => TRUE,
            'jsonField' => 'currency_symbol',
            'width' => '15%'
        ),
        'edit' => array(
            'isSortable' => FALSE,
            'jsonField' => 'currency_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'strap_material',
            'callBackFunction' => 'get_edit_link',
            'width' => '1%'
        ),
        'delete' => array(
            'isSortable' => FALSE,
            'jsonField' => 'currency_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'currency',
            'callBackFunction' => 'get_delete_link',
            'width' => '1%'
        )
    );

    $config['model_listing_headers'] = array(
        'model_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'model_name',
            'width' => '45%'
        ),
        'collection_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'collection_name',
            'width' => '20%'
        ),
        'brand_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'brand_name',
            'width' => '20%'
        ),
        'movement_id' => array(
            'isSortable' => TRUE,
            'jsonField' => 'movement',
            'width' => '30%'
        ),
        'edit' => array(
            'isSortable' => FALSE,
            'jsonField' => 'model_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'model',
            'callBackFunction' => 'get_edit_link',
            'width' => '1%'
        ),
        'delete' => array(
            'isSortable' => FALSE,
            'jsonField' => 'model_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'model',
            'callBackFunction' => 'get_delete_link',
            'width' => '1%'
        )
    );

    $config['client_listing_headers'] = array(
        'client_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'client_name',
            'width' => '15%'
        ),
        'contact_person' => array(
            'isSortable' => TRUE,
            'jsonField' => 'contact_person',
            'width' => '15%'
        ),
        'phone_number' => array(
            'isSortable' => TRUE,
            'jsonField' => 'phone_number',
            'width' => '15%'
        ),
        'email_id' => array(
            'isSortable' => TRUE,
            'jsonField' => 'email_id',
            'width' => '15%'
        ),
        'address' => array(
            'isSortable' => TRUE,
            'jsonField' => 'address',
            'width' => '15%'
        ),
        'city' => array(
            'isSortable' => TRUE,
            'jsonField' => 'city',
            'width' => '15%'
        ),
        'country_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'country_name',
            'width' => '15%'
        ),
        'edit' => array(
            'isSortable' => FALSE,
            'jsonField' => 'client_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'client',
            'callBackFunction' => 'get_edit_link',
            'width' => '1%'
        ),
        'delete' => array(
            'isSortable' => FALSE,
            'jsonField' => 'client_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'client',
            'callBackFunction' => 'get_delete_link',
            'width' => '1%'
        )
    );

    $config['brand_listing_headers'] = array(
        'brand_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'brand_name',
            'width' => '90%'
        ),
        'edit' => array(
            'isSortable' => FALSE,
            'jsonField' => 'brand_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'brand',
            'callBackFunction' => 'get_edit_link',
            'width' => '1%'
        ),
        'delete' => array(
            'isSortable' => FALSE,
            'jsonField' => 'brand_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'brand',
            'callBackFunction' => 'get_delete_link',
            'width' => '1%'
        )
    );

    $config['collection_listing_headers'] = array(
        'collection_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'collection_name',
            'width' => '45%'
        ),
        'brand_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'brand_name',
            'width' => '45%'
        ),
        'edit' => array(
            'isSortable' => FALSE,
            'jsonField' => 'collection_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'collection',
            'callBackFunction' => 'get_edit_link',
            'width' => '1%'
        ),
        'delete' => array(
            'isSortable' => FALSE,
            'jsonField' => 'collection_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'collection',
            'callBackFunction' => 'get_delete_link',
            'width' => '1%'
        )
    );

    // *******************INVENTORY****************************//

    $config['inventory_listing_headers'] = array(
        'inventory_record_number' => array(
            'isSortable' => TRUE,
            'jsonField' => 'inventory_record_number',
            'width' => '15%'
        ),
        'brand_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'brand_name',
            'width' => '15%'
        ),
        'collection_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'collection_name',
            'width' => '15%'
        ),
        'model_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'model_name',
            'width' => '15%'
        ),
        'watch_location' => array(
            'isSortable' => TRUE,
            'jsonField' => 'watch_location',
            'width' => '15%'
        ),
        'sale' => array(
            'isSortable' => FALSE,
            'systemDefaults' => TRUE,
            'type' => 'OTHER_ICON',
            'iconClass' => 'fa fa-dollar',
            'isLink' => TRUE,
            'linkParams' => array('inventory_id'),
            'linkTarget' => 'admin/inventory/add_sale/',
            'width' => '10%',
            'align' => 'center'
        ),
        'view' => array(
            'jsonField' => 'inventory_id',
            'isSortable' => FALSE,
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackFunction' => 'inventory_message',
            'width' => '1%',
            'align' => 'center'
        ),
        'Copy' => array(
            'isSortable' => FALSE,
            'systemDefaults' => TRUE,
            'type' => 'COPY_ICON',
            'confirmBox' => TRUE,
            'isLink' => TRUE,
            'linkParams' => array('inventory_id'),
            'linkTarget' => 'admin/inventory/add_inventory/copy/',
            'width' => '1%',
            'align' => 'center'
        ),
        'Print' => array(
            'isSortable' => FALSE,
            'systemDefaults' => TRUE,
            'type' => 'PRINT_ICON',
            'isLink' => TRUE,
            'linkClasses' => "print-form",
            'linkParams' => array('inventory_id'),
            'linkTarget' => 'admin/inventory/print_inventory_data/',
            'width' => '1%',
            'align' => 'center'
        ),
        'edit' => array(
            'isSortable' => FALSE,
            'jsonField' => 'inventory_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'inventory',
            'callBackFunction' => 'get_edit_link',
            'width' => '1%'
        ),
        'delete' => array(
            'isSortable' => FALSE,
            'jsonField' => 'inventory_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'inventory',
            'callBackFunction' => 'get_delete_link',
            'width' => '1%'
        ),
//        'edit' => array(
//            'isSortable' => FALSE,
//            'systemDefaults' => TRUE,
//            'type' => 'EDIT_ICON',
//            'isLink' => TRUE,
//            'linkParams' => array('inventory_id'),
//            'linkTarget' => 'admin/inventory/add_inventory/edit/',
//            'width' => '5%',
//            'align' => 'center'
//        ),
//        'delete' => array(
//            'isSortable' => FALSE,
//            'systemDefaults' => TRUE,
//            'type' => 'DELETE_ICON',
//            'confirmBox' => TRUE,
//            'isLink' => TRUE,
//            'linkParams' => array('inventory_id'),
//            'linkTarget' => 'admin/inventory/delete_inventory/',
//            'width' => '1%',
//            'align' => 'center'
//        ),
    );

    //******************** Movement******************
    $config['movement_listing_headers'] = array(
        'brand_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'brand_name',
            'width' => '30%'
        ),
        'type' => array(
            'isSortable' => TRUE,
            'jsonField' => 'type',
            'width' => '30%'
        ),
        'movement' => array(
            'isSortable' => TRUE,
            'jsonField' => 'movement',
            'width' => '30%'
        ),
        'edit' => array(
            'isSortable' => FALSE,
            'jsonField' => 'movement_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'movement',
            'callBackFunction' => 'get_edit_link',
            'width' => '1%'
        ),
        'delete' => array(
            'isSortable' => FALSE,
            'jsonField' => 'movement_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'movement',
            'callBackFunction' => 'get_delete_link',
            'width' => '1%'
        )
    );


    $config['accessory_listing_headers'] = array(
        'accessory_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'accessory_name',
            'width' => '90%'
        ),
        'edit' => array(
            'isSortable' => FALSE,
            'systemDefaults' => TRUE,
            'type' => 'EDIT_ICON',
            'isLink' => TRUE,
            'linkParams' => array('accessory_id'),
            'linkTarget' => 'admin/accessory/add_accessory/',
            'width' => '5%',
            'align' => 'center'
        ),
        'delete' => array(
            'isSortable' => FALSE,
            'systemDefaults' => TRUE,
            'type' => 'DELETE_ICON',
            'confirmBox' => TRUE,
            'isLink' => TRUE,
            'linkParams' => array('accessory_id'),
            'linkTarget' => 'admin/accessory/delete_accessory/',
            'width' => '1%',
            'align' => 'center'
        ),
        'edit' => array(
            'isSortable' => FALSE,
            'jsonField' => 'accessory_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'accessory',
            'callBackFunction' => 'get_edit_link',
            'width' => '1%'
        ),
        'delete' => array(
            'isSortable' => FALSE,
            'jsonField' => 'accessory_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'accessory',
            'callBackFunction' => 'get_delete_link',
            'width' => '1%'
        )
    );

    $config['box_listing_headers'] = array(
        'box_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'box_name',
            'width' => '90%'
        ),
        'edit' => array(
            'isSortable' => FALSE,
            'jsonField' => 'box_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'box',
            'callBackFunction' => 'get_edit_link',
            'width' => '1%'
        ),
        'delete' => array(
            'isSortable' => FALSE,
            'jsonField' => 'box_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'box',
            'callBackFunction' => 'get_delete_link',
            'width' => '1%'
        )
    );
    $config['buckle_type_listing_headers'] = array(
        'buckle_type_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'buckle_type_name',
            'width' => '90%'
        ),
        'edit' => array(
            'isSortable' => FALSE,
            'jsonField' => 'buckle_type_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'buckle_type',
            'callBackFunction' => 'get_edit_link',
            'width' => '1%'
        ),
        'delete' => array(
            'isSortable' => FALSE,
            'jsonField' => 'buckle_type_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'buckle_type',
            'callBackFunction' => 'get_delete_link',
            'width' => '1%'
        )
    );

   


    $config['location_listing_headers'] = array(
        'location_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'location_name',
            'width' => '50%'
        ),
        'edit' => array(
            'isSortable' => FALSE,
            'jsonField' => 'location_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'location',
            'callBackFunction' => 'get_edit_link',
            'width' => '1%'
        ),
        'delete' => array(
            'isSortable' => FALSE,
            'jsonField' => 'location_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'location',
            'callBackFunction' => 'get_delete_link',
            'width' => '1%'
        )
    );

    // *******************Delivered****************************//

    $config['delivered_listing_headers'] = array(
//        'model_image' => array(
//            'isSortable' => FALSE,
//            'jsonField' => 'model_id',
//            'width' => '4%',
//            'callBack' => TRUE,
//            'callBackType' => 'helper',
//            'callBackClass' => 'project_helper',
//            'callBackFunction' => 'get_model_image3',
//        ),
        'inventory_record_number' => array(
            'isSortable' => TRUE,
            'jsonField' => 'inventory_record_number',
            'width' => '15%'
        ),
//        'date' => array(
//            'isSortable' => TRUE,
//            'jsonField' => 'date',
//            'width' => '15%'
//        ),
        'brand_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'brand_name',
            'width' => '15%'
        ),
        'model_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'model_name',
            'width' => '15%'
        ),
        'watch_location' => array(
            'isSortable' => TRUE,
            'jsonField' => 'watch_location',
            'width' => '15%'
        ),
        'delivery_location' => array(
            'isSortable' => TRUE,
            'jsonField' => 'delivery_location',
            'width' => '15%'
        ),
        'history_location' => array(
            'isSortable' => TRUE,
            'jsonField' => 'location_name',
            'width' => '15%'
        ),
        'Delivery Date' => array(
            'jsonField' => 'inventory_id',
            'isSortable' => FALSE,
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackFunction' => 'date_message',
            'width' => '1%',
            'align' => 'center'
        ),
        'History' => array(
            'jsonField' => 'inventory_id',
            'isSortable' => FALSE,
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackFunction' => 'history_message',
            'width' => '1%',
            'align' => 'center'
        ),
    );

    // *******************Accessories****************************//

    $config['accessories_listing_headers'] = array(
        'inventory_record_number' => array(
            'isSortable' => TRUE,
            'jsonField' => 'inventory_record_number',
            'width' => '15%'
        ),
        'brand_name' => array(
            'isSortable' => TRUE,
            'jsonField' => 'brand_name',
            'width' => '15%'
        ),
        'watch_location' => array(
            'isSortable' => TRUE,
            'jsonField' => 'watch_location',
            'width' => '15%'
        ),
        'view' => array(
            'jsonField' => 'inventory_id',
            'isSortable' => FALSE,
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackFunction' => 'accessories_message',
            'width' => '1%',
            'align' => 'center'
        ),
        'Copy' => array(
            'isSortable' => FALSE,
            'systemDefaults' => TRUE,
            'type' => 'COPY_ICON',
            'confirmBox' => TRUE,
            'isLink' => TRUE,
            'linkParams' => array('inventory_id'),
            'linkTarget' => 'admin/inventory/add_accessories/copy/',
            'width' => '1%',
            'align' => 'center'
        ),
        'edit' => array(
            'isSortable' => FALSE,
            'jsonField' => 'inventory_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'accessories',
            'callBackFunction' => 'get_edit_link',
            'width' => '1%'
        ),
        'delete' => array(
            'isSortable' => FALSE,
            'jsonField' => 'inventory_id',
            'callBack' => TRUE,
            'callBackType' => 'helper',
            'callBackClass' => 'common_helper',
            'callBackParam' => 'accessories',
            'callBackFunction' => 'get_delete_link',
            'width' => '1%'
        ),
//        'edit' => array(
//            'isSortable' => FALSE,
//            'systemDefaults' => TRUE,
//            'type' => 'EDIT_ICON',
//            'isLink' => TRUE,
//            'linkParams' => array('inventory_id'),
//            'linkTarget' => 'admin/inventory/add_accessories/edit/',
//            'width' => '5%',
//            'align' => 'center'
//        ),
//        'delete' => array(
//            'isSortable' => FALSE,
//            'systemDefaults' => TRUE,
//            'type' => 'DELETE_ICON',
//            'confirmBox' => TRUE,
//            'isLink' => TRUE,
//            'linkParams' => array('inventory_id'),
//            'linkTarget' => 'admin/inventory/delete_accessories/',
//            'width' => '1%',
//            'align' => 'center'
//        ),
    );

//


    

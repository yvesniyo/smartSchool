<?php

return [
    'dashboard' => [
        'title' => "Dashboard"
    ],
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',

            //Belongs to many relations
            'roles' => 'Roles',

        ],
    ],

    'school' => [
        'title' => 'Schools',

        'actions' => [
            'index' => 'Schools',
            'create' => 'New School',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'location' => 'Location',
            'enabled' => 'Enabled',

        ],
    ],

    'device' => [
        'title' => 'Devices',

        'actions' => [
            'index' => 'Devices',
            'create' => 'New Device',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'uuid' => 'Uuid',
            'version' => 'Version',
            'admin_user_id' => 'Admin user',
            'school_id' => 'School',

        ],
    ],

    'device' => [
        'title' => 'Devices',

        'actions' => [
            'index' => 'Devices',
            'create' => 'New Device',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'device' => [
        'title' => 'Devices',

        'actions' => [
            'index' => 'Devices',
            'create' => 'New Device',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'uuid' => 'Uuid',
            'version' => 'Version',
            'admin_user_id' => 'Admin user',
            'enabled' => 'Enabled',
            'school_id' => 'School',

        ],
    ],

    'student' => [
        'title' => 'Students',

        'actions' => [
            'index' => 'Students',
            'create' => 'New Student',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'nfc' => 'Nfc',
            'parent_phone_number' => 'Parent phone number',
            'active' => 'Active',

        ],
    ],

    'attendancy' => [
        'title' => 'Attendancies',

        'actions' => [
            'index' => 'Attendancies',
            'create' => 'New Attendancy',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'notified' => 'Notified',
            'student_id' => 'Student',

        ],
    ],

    'student' => [
        'title' => 'Students',

        'actions' => [
            'index' => 'Students',
            'create' => 'New Student',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'nfc' => 'Nfc',
            'parent_phone_number' => 'Parent phone number',
            'is_active' => 'Is active',

        ],
    ],

    'attendancy' => [
        'title' => 'Attendancies',

        'actions' => [
            'index' => 'Attendancies',
            'create' => 'New Attendancy',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'notified' => 'Notified',
            'student_id' => 'Student',

        ],
    ],

    'device' => [
        'title' => 'Devices',

        'actions' => [
            'index' => 'Devices',
            'create' => 'New Device',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'uuid' => 'Uuid',
            'version' => 'Version',
            'admin_user_id' => 'Admin user',
            'enabled' => 'Enabled',
            'school_id' => 'School',

        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];

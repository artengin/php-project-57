<?php

return [
    'index' => 'Статусы',
    'id' => 'ID',
    'destroy' => 'Destroy',
    'created_at' => 'Created at',
    'name' => 'Name',
    'edit' => 'Edit',
    'actions' => 'Actions',
    'create' => 'Create status',
    'store' => 'Store',
    'update' => 'Update',
    'deleted' => 'Status successfully deleted',
    'stored' => 'Status successfully created',
    'updated' => 'Status successfully changed',
    'has_tasks' => 'Failed to delete status',
    'validation' => [
        'name' => [
            'unique' => 'A status by that name already exists',
        ],
    ],
];
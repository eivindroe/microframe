<?php
namespace MicroFrame\Database;

interface TableBase
{
    public function getTableName();
    public function getTableColumns();
}// TableBase
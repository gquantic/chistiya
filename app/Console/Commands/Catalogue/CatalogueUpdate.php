<?php

namespace App\Console\Commands\Catalogue;

use App\Imports\ProductsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CatalogueUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'catalogue:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Выгрузить изменение товаров из Excel таблицы (не запускать пустой файл с только новыми позициями)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Excel::import(new ProductsImport, Storage::disk('public')->get('products.xlsx'));
    }
}

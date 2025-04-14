<?php

namespace App\DataTables;

use App\Models\KategoriModel;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\Services\DataTable;

class KategoriDataTable extends DataTable
{
    /**
     * Menampilkan data dalam bentuk DataTable.
     *
     * @param QueryBuilder $query
     * @return EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                return '
                    <div class="btn-group">
                        <a href="'.route('kategori.edit', $row->kategori_id).'" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="'.route('kategori.destroy', $row->kategori_id).'" method="POST" style="display:inline;">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah Anda yakin ingin menghapus?\')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                ';
            })
            ->rawColumns(['action'])
            ->setRowId('kategori_id');
    }


    
    public function query(KategoriModel $model): QueryBuilder
    {
        $query = $model->newQuery();
        // dd($query->get()); // Debugging untuk melihat hasil query
        return $query;
    }
    

    /**
     * Konfigurasi builder untuk DataTable.
     *
     * @return Builder
     */
    public function html(): Builder
    {
        return $this->builder()
        ->setTableId('kategori-table')
        ->columns([
            Column::make('kategori_id')->title('ID'),
            Column::make('kategori_kode')->title('Kode'),
            Column::make('kategori_nama')->title('Nama'),
        ])
        ->minifiedAjax()
        ->dom('Bfrtip')
        ->orderBy(1)
        ->buttons(
            Button::make('excel'),
            Button::make('csv'),
            Button::make('pdf'),
            Button::make('print'),
            Button::make('reset'),
            Button::make('reload')
        );
    }

    /**
     * Menentukan kolom untuk DataTables.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('kategori_id'),
            Column::make('kategori_kode'),
            Column::make('kategori_nama'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    /**
     * Menentukan nama file untuk ekspor.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Kategori_' . date('YmdHis');
    }
}

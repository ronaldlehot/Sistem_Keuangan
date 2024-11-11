<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Transaction;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Awal extends BaseWidget
{

    use InteractsWithPageFilters;


    protected function getStats(): array
    {



        $startDate = ! is_null($this->filters['startDate'] ?? null) ?
            Carbon::parse($this->filters['startDate']) :
            null;

        $endDate = ! is_null($this->filters['endDate'] ?? null) ?
            Carbon::parse($this->filters['endDate']) :
            now();

        $pemasukan = Transaction::incomes()->whereBetween('date_transaction',[$startDate, $endDate])->sum('amount');
        $pengeluaran = Transaction::expenses()->whereBetween('date_transaction', [$startDate, $endDate])->sum('amount');
        $difference = $pemasukan - $pengeluaran;

        return [
            Stat::make('Total Pemasukan', 'Rp ' . number_format($pemasukan))
                ->description('Total pendapatan')
                ->icon('heroicon-o-arrow-trending-up')
                ->color('success'),
            Stat::make('Total Pengeluaran', 'Rp ' . number_format($pengeluaran))
                ->description('Total beban')
                ->icon('heroicon-o-arrow-trending-down')
                ->color('danger'),
            Stat::make('Selisih', 'Rp ' . number_format($difference))
                ->description($difference >= 0 ? 'Surplus' : 'Defisit')
                ->icon('heroicon-o-calculator')
                ->color($difference >= 0 ? 'success' : 'danger'),
        ];
    }
}

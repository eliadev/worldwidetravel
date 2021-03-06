<?php

namespace App\Exports;

use App\Package;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class PackagesExport implements FromQuery, ShouldAutoSize, WithHeadings, WithMapping
{
	use Exportable;

	public function __construct(array $filters)
    {
        $this->filters = $filters;
    }
    
    public function headings(): array
    {
        return [
            'name', 
            'from', 
            'to', 
			'client',
            'price'
        ];
    }

    public function map($package): array
    {
        return [
            $package->name,
            $package->from,
            $package->to,
			$package->client->full_name,
            $package->price
        ];
    }

    public function query()
    {
        $packageQuery = Package::query();

        if(isset($this->filters['client_id']))
            $packageQuery->where('client_id', $this->filters['client_id']);

        if(isset($this->filters['has_hotel']))
            $packageQuery->where('has_hotel', 1);

        if(isset($this->filters['has_flight_ticket']))
            $packageQuery->where('has_flight_ticket', 1);

        if(isset($this->filters['has_visa']))
            $packageQuery->where('has_visa', 1);
            
        if(isset($this->filters['has_cruise']))
            $packageQuery->where('has_cruise', 1);

        if(isset($this->filters['has_train']))
            $packageQuery->where('has_train', 1);

        if(isset($this->filters['from']))
            $packageQuery->where('from', '>=', $this->filters['from']);

        if(isset($this->filters['to']))
            $packageQuery->where('to', '<=', $this->filters['to']);
		
		if(isset($this->filters['name']))
            $packageQuery->where('name', $this->filters['name']);

        return $packageQuery;
    }
}


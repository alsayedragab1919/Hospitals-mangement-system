<button class="btn btn-primary pull-right" wire:click="show_form_add" type="button">{{__('Dashboard/group_invoice.add_new_invoice')}} </button><br><br>
<div class="table-responsive">
    <table class="table text-md-nowrap" id="example1" data-page-length="50"style="text-align: center">
        <thead>
        <tr>
            <th>#</th>
            <th>{{__('Dashboard/group_invoice.service_name')}}</th>
            <th>{{__('Dashboard/group_invoice.Patients_name')}}</th>
            <th>{{__('Dashboard/group_invoice.Invoice_date')}}</th>
            <th>{{__('Dashboard/group_invoice.Doctors_name')}}</th>
            <th>{{__('Dashboard/group_invoice.section')}}</th>
            <th>{{__('Dashboard/group_invoice.Service_price')}}</th>
            <th>{{__('Dashboard/group_invoice.Service_price')}}</th>
            <th>{{__('Dashboard/group_invoice.tax_rate')}}</th>
            <th>{{__('Dashboard/group_invoice.Tax_value')}}</th>
            <th>{{__('Dashboard/group_invoice.total_with_tax')}}</th>
            <th>{{__('Dashboard/group_invoice.Invoice_type')}}</th>
            <th>{{__('Dashboard/group_invoice.Operations')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($group_invoices as $group_invoice)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $group_invoice->Group->name }}</td>
                <td>{{ $group_invoice->Patient->name }}</td>
                <td>{{ $group_invoice->invoice_date }}</td>
                <td>{{ $group_invoice->Doctor->name }}</td>
                <td>{{ $group_invoice->Section->name }}</td>
                <td>{{ number_format($group_invoice->price, 2) }}</td>
                <td>{{ number_format($group_invoice->discount_value, 2) }}</td>
                <td>{{ $group_invoice->tax_rate }}%</td>
                <td>{{ number_format($group_invoice->tax_value, 2) }}</td>
                <td>{{ number_format($group_invoice->total_with_tax, 2) }}</td>
                <td>{{ $group_invoice->type == 1 ? __('Dashboard/group_invoice.cash'):__('Dashboard/group_invoice.credit') }}</td>
                <td>
                    <button wire:click="edit({{ $group_invoice->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_invoice" wire:click="delete({{ $group_invoice->id }})" ><i class="fa fa-trash"></i></button>
                    <a href="#"  wire:click="print({{ $group_invoice->id }})" class="btn btn-primary btn-sm" target="_blank" title="طباعه سند صرف"><i class="fas fa-print"></i></a>
                </td>
            </tr>

        @endforeach
    </table>
    @include('livewire.group_invoices.delete')
</div>

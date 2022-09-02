<table>
    <thead>
        <tr>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">No</th>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">Nama Kendaraan</th>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">Tipe</th>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">Pool</th>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">Driver</th>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $book)
        @php
            $approval = $book->hasApproval;
            $status = '';
            $status2 = '';
            $finalStatus = '';
            foreach ($approval as $key => $value) {
                if ($value->signed_by == 'ADM001') {
                    $status = $value->status;
                } else {
                    $status2 = $value->status;
                }
            }
            if($status == 'deny'){
                $finalStatus = 'Ditolak oleh Admin';
            }else{
                if($status2 == 'deny'){
                    $finalStatus = 'Ditolak oleh Atasan';
                } else {
                    if(count($book->hasApproval) == 0){
                        $finalStatus = 'Belum Disetujui oleh Admin';
                    }
                if(count($book->hasApproval) == 1){
                    $finalStatus = 'Belum Disetujui oleh Atasan';
                }
                if(count($book->hasApproval) == 2){
                    $finalStatus = 'Disetujui';
                }
            }
        }
        @endphp
        <tr>
            <td align="center" style="border: 1px solid #000000;">
                {{ $loop->iteration }}
            </td>
            <td align="center" style="border: 1px solid #000000;">
                {{ $book->hasVehicle->name }}
            </td>
            <td align="center" style="border: 1px solid #000000;">
                {{ $book->hasVehicle->type }}
            </td>
            <td align="center" style="border: 1px solid #000000;">
                {{ $book->hasPool->pool_name }}
            </td>
            <td align="center" style="border: 1px solid #000000;">
                {{$book->driver}}
            </td>
            <td align="center" style="border: 1px solid #000000;">
                {{$finalStatus}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
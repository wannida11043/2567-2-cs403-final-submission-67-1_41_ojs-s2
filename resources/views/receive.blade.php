@extends('layout')
@section('doc', 'receive')
@section('content')

    <div class="row">
        <div class="col-md-2 ">
            <label for="CustomerName" class="form-label fs-5">ประวัติการดำเนินการ</label>
        </div>
        <form class="d-flex col-md-2" role="search">
            <input id="searchInput" class="form-control me-2" type="search" placeholder="ค้นหาเลขทะเบียน...">
        </form>

    </div>
    <hr>
    <table class="table table-grid">
        <thead class="text-center">
            <tr>
                <th>ทะเบียนรถ</th>
                <th>ชื่อ</th>
                <th>เบอร์โทร</th>
                <th>สถานะ</th>
                <th>หลักฐาน</th>
                <th>วันที่บันทึก</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($list as $item)
                <tr>
                    <td>{{ $item->CarNumber }}</td>
                    <td>{{ $item->CustomerName }}</td>
                    <td>{{ $item->PhoneNumber }}</td>
                    <td
                        style="color: {{ $item->SelectOption == 'จัดส่งตามที่อยู่' ? '#FF0000' : ($item->SelectOption == 'มารับเอง' ? '#424ddf' : '') }}">
                        {{ $item->SelectOption }}
                    </td>
                    <form action="{{ route('history.update', $item->history_id) }}" method="POST"
                        enctype="multipart/form-data" id="form-{{ $item->history_id }}">
                        @csrf
                        <td>
                            @if ($item->SelectOption == 'จัดส่งตามที่อยู่')
                                <input type="text" class="form-control" name="ProofOfReceive"
                                    value="{{ old('ProofOfReceive', $item->ProofOfReceive) }}"
                                    placeholder="กรุณากรอกเลขพัสดุ" id="proof-{{ $item->history_id }}"
                                    {{ !empty($item->ProofOfReceive) ? 'disabled' : '' }}>
                            @elseif ($item->SelectOption == 'มารับเอง')
                                @if (!empty($item->ProofOfReceive))
                                    <input type="file" class="form-control mt-2" name="ProofOfReceive"
                                        id="proof-{{ $item->history_id }}"
                                        {{ !empty($item->ProofOfReceive) ? 'disabled' : '' }}>
                                    <a href="{{ asset('public/proofs/' . $item->ProofOfReceive) }}"
                                        class="btn btn-info btn-sm mt-2" style="background-color: #A2D7FF; border: none;"
                                        download>
                                        ดาวน์โหลด
                                    </a>
                                    <span class="mt-2">{{ $item->ProofOfReceive }}</span>
                                @else
                                    <input type="file" class="form-control" name="ProofOfReceive"
                                        id="proof-{{ $item->history_id }}">
                                @endif
                            @endif
                        </td>
                        <td>
                            <span style="display: block;">
                                {{ !empty($item->ProofOfReceive) ? \Carbon\Carbon::parse($item->updated_at)->format('d/m/Y') : '' }}
                            </span>
                            <span>
                                {{ !empty($item->ProofOfReceive) ? \Carbon\Carbon::parse($item->updated_at)->format('H:i') : '' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <button type="submit" class="btn btn-light btn-sm save-btn"
                                    id="submit-btn-{{ $item->history_id }}"
                                    style="background-color: {{ !empty($item->ProofOfReceive) ? '#ccc' : '#A4F02A' }}"
                                    {{ !empty($item->ProofOfReceive) ? 'disabled' : '' }}>
                                    บันทึก
                                </button>
                                <button type="button" class="btn btn-warning btn-sm edit-btn"
                                    data-id="{{ $item->history_id }}"
                                    style="background-color: {{ !empty($item->ProofOfReceive) ? '#F9D74E' : '#ccc' }}; border: none;"
                                    {{ empty($item->ProofOfReceive) ? 'disabled' : '' }}>
                                    แก้ไข
                                </button>
                            </div>
                        </td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#searchInput").on("keyup", function() {
                let value = $(this).val().toLowerCase();
                $("table tbody tr").filter(function() {
                    $(this).toggle($(this).find("td:nth-child(1)").text().toLowerCase()
                        .indexOf(value) > -1);
                });
            });
        });
        $(document).ready(function() {
            $('form').submit(function(event) {
                var form = $(this);
                var proofInput = form.find('input[name="ProofOfReceive"]');
                var submitButton = form.find('.save-btn');
                var proofValue = proofInput.val().trim();

                if (!proofValue) {
                    alert('กรุณากรอกข้อมูลหลักฐานก่อน');
                    event.preventDefault();
                    return false;
                }

                submitButton.prop('disabled', true).css('background-color', '#ccc');
                proofInput.prop('disabled', true).css('background-color', '#f0f0f0');
                var editButton = form.find('.edit-btn');
                editButton.prop('disabled', true).css('background-color', '#ccc');
            });

            $('.edit-btn').click(function() {
                var row = $(this).closest('tr');
                var submitButton = row.find('.save-btn');
                var proofInput = row.find('input[name="ProofOfReceive"]');
                var editButton = row.find('.edit-btn');

                submitButton.prop('disabled', false).css('background-color', '#A4F02A');
                proofInput.prop('disabled', false).css('background-color', '#ffffff');
                editButton.prop('disabled', false).css('background-color', '#F9D74E');
            });

        });
    </script>

@endsection

@if (session('success'))
    <script>
        alert('บันทึกเรียบร้อยแล้ว');
    </script>
@endif

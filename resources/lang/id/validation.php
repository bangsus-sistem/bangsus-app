<?php

return [

    'accepted' => ':attribute harus disetujui.',
    'active_url' => ':attribute bukan URL yang valid.',
    'after' => ':attribute harus sesudah :date.',
    'after_or_equal' => ':attribute harus sesudah atau sama dengan :date.',
    'alpha' => ':attribute hanya boleh mengandung karakter.',
    'alpha_dash' => ':attribute hanya boleh mengandung huruf, nomor, strip dan underscore.',
    'alpha_num' => ':attribute hanya boleh mengandung huruf dan nomor.',
    'array' => ':attribute harus berupa array.',
    'before' => ':attribute harus sebelum :date.',
    'before_or_equal' => ':attribute harus sebelum atau sama dengan to :date.',
    'between' => [
        'numeric' => ':attribute harus diantara :min dan :max.',
        'file' => 'Ukuran :attribute harus berukuran diantara :min dan :max kilobytes.',
        'string' => ':attribute harus memiliki diantara :min dan :max karakter.',
        'array' => ':attribute harus memiliki item sebanyak diantara :min dan :max item.',
    ],
    'boolean' => ':attribute field harus bernilai true atau false.',
    'confirmed' => ':attribute harus dikonfirmasi.',
    'date' => ':attribute bukan merupakan tanggal yang valid.',
    'date_equals' => ':attribute harus sama dengan :date.',
    'date_format' => ':attribute tidak sesuai format tanggal :format.',
    'different' => ':attribute dan :other harus berbeda.',
    'digits' => ':attribute harus memiliki :digits digit.',
    'digits_between' => ':attribute harus memiliki diantara :min dan :max digit.',
    'dimensions' => 'dimensi :attribute tidak valid.',
    'distinct' => ':attribute tidak boleh memiliki nilai yang sama.',
    'email' => ':attribute bukan merupakan alamat email valid.',
    'ends_with' => ':attribute harus berakhir dengan salah satu berikut: :values.',
    'exists' => ':attribute yang dipilih tidak ditemukan.',
    'file' => ':attribute harus sebuah file.',
    'filled' => ':attribute harus diisi.',
    'gt' => [
        'numeric' => ':attribute harus lebih besar dari :value.',
        'file' => ':attribute harus berukuran lebih besar dari :value kilobytes.',
        'string' => ':attribute harus mengandung lebih dari :value karakter.',
        'array' => ':attribute harus memiliki lebih dari :value item.',
    ],
    'gte' => [
        'numeric' => ':attribute harus lebih besar dari atau sama dengan :value.',
        'file' => ':attribute harus berukuran lebih besar dari atau sama dengan :value kilobytes.',
        'string' => ':attribute tidak boleh kurang dari :value karakter.',
        'array' => ':attribute harus memiliki :value items atau lebih.',
    ],
    'image' => ':attribute harus sebuah gambar.',
    'in' => ':attribute yang dipilih tidak valid.',
    'in_array' => ':attribute tidak ada di :other.',
    'integer' => ':attribute harus sebuah angka.',
    'ip' => ':attribute harus sebuah alamat IP valid.',
    'ipv4' => ':attribute harus sebuah alamat IPv4 valid.',
    'ipv6' => ':attribute harus sebuah alamat IPv6 valid.',
    'json' => ':attribute harus sebuah JSON.',
    'lt' => [
        'numeric' => ':attribute harus kurang dari :value.',
        'file' => ':attribute harus berukuran kurang dari :value kilobytes.',
        'string' => ':attribute harus mengandung kurang dari :value karakter.',
        'array' => ':attribute harus memiliki kurang dari :value item.',
    ],
    'lte' => [
        'numeric' => ':attribute harus kurang dari atau sama dengan :value.',
        'file' => ':attribute harus berukuran kurang dari atau sama dengan :value kilobytes.',
        'string' => ':attribute tidak boleh lebih dari :value karakter.',
        'array' => ':attribute tidak boleh memiliki lebih dari :value item.',
    ],
    'max' => [
        'numeric' => ':attribute tidak boleh lebih besar dari :max.',
        'file' => ':attribute tidak boleh berukuran lebih besar dari :max kilobytes.',
        'string' => ':attribute tidak boleh mengandung lebih dari :max karakter.',
        'array' => ':attribute tidak boleh memiliki lebih dari :max item.',
    ],
    'mimes' => ':attribute harus sebuah file dengan tipe: :values.',
    'mimetypes' => ':attribute harus sebuah file dengan tipe: :values.',
    'min' => [
        'numeric' => ':attribute harus setidaknya :min.',
        'file' => ':attribute harus berukuran setidaknya :min kilobytes.',
        'string' => ':attribute harus mengandung setidaknya :min karakter.',
        'array' => ':attribute harus memiliki setidaknya :min item.',
    ],
    'multiple_of' => ':attribute harus perkalian dari :value',
    'not_in' => ':attribute terpilih tidak valid.',
    'not_regex' => 'Format :attribute tidak valid.',
    'numeric' => ':attribute harus sebuah angka.',
    'password' => 'password salah.',
    'present' => ':attribute field harus ada.',
    'regex' => ':attribute tidak valid.',
    'required' => ':attribute harus diisi.',
    'required_if' => ':attribute harus diisi jika :other bernilai :value.',
    'required_unless' => ':attribute harus diisi kecuali :other bernilai :values.',
    'required_with' => ':attribute harus diisi jika :values terisi.',
    'required_with_all' => ':attribute harus diisi jika :values terisi.',
    'required_without' => ':attribute harus diisi jika :values tidak terisi.',
    'required_without_all' => ':attribute harus diisi jika tidak ada :values yang terisi.',
    'same' => ':attribute dan :other tidak sama.',
    'size' => [
        'numeric' => ':attribute harus :size.',
        'file' => ':attribute harus berukuran :size kilobytes.',
        'string' => ':attribute harus mengandung :size karakter.',
        'array' => ':attribute harus memiliki :size item.',
    ],
    'starts_with' => ':attribute harus dimulai dengan salah satu berikut: :values.',
    'string' => ':attribute harus sebuah string.',
    'timezone' => ':attribute harus sebuah timezone.',
    'unique' => ':attribute sudah dipakai.',
    'uploaded' => ':attribute gagal upload.',
    'url' => ':attribute tidak valid.',
    'uuid' => ':attribute harus sebuah UUID valid.',


    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];
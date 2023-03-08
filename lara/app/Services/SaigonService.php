<?php

namespace App\Services;

class SaigonService
{
  const DISTRICTS =  [
    'code' => 'SG',
    'name' => 'Hồ Chí Minh',
    'district' =>
    [
      0 =>
      [
        'name' => 'Bình Chánh',
        'code' => 'd_binh_chanh',
        'pre' => 'Huyện',
        'ward' =>
        [
          0 =>
          [
            'name' => 'An Phú Tây',
            'pre' => 'Xã',
            'code' => 'w_an_phu_tay',
          ],
          1 =>
          [
            'name' => 'Bình Chánh',
            'pre' => 'Xã',
            'code' => 'w_binh_chanh',
          ],
          2 =>
          [
            'name' => 'Bình Hưng',
            'pre' => 'Xã',
            'code' => 'w_binh_hung',
          ],
          3 =>
          [
            'name' => 'Bình Lợi',
            'pre' => 'Xã',
            'code' => 'w_binh_loi',
          ],
          4 =>
          [
            'name' => 'da Phước',
            'pre' => 'Xã',
            'code' => 'w_da_phuoc',
          ],
          5 =>
          [
            'name' => 'Hưng Long',
            'pre' => 'Xã',
            'code' => 'w_hung_long',
          ],
          6 =>
          [
            'name' => 'Lê Minh Xuân',
            'pre' => 'Xã',
            'code' => 'w_le_minh_xuan',
          ],
          7 =>
          [
            'name' => 'Phạm Văn Hai',
            'pre' => 'Xã',
            'code' => 'w_pham_van_hai',
          ],
          8 =>
          [
            'name' => 'Phong Phú',
            'pre' => 'Xã',
            'code' => 'w_phong_phu',
          ],
          9 =>
          [
            'name' => 'Quy dức',
            'pre' => 'Xã',
            'code' => 'w_quy_duc',
          ],
          10 =>
          [
            'name' => 'Tân Kiên',
            'pre' => 'Xã',
            'code' => 'w_tan_kien',
          ],
          11 =>
          [
            'name' => 'Tân Nhựt',
            'pre' => 'Xã',
            'code' => 'w_tan_nhut',
          ],
          12 =>
          [
            'name' => 'Tân Quý Tây',
            'pre' => 'Xã',
            'code' => 'w_tan_quy_tay',
          ],
          13 =>
          [
            'name' => 'Tân Túc',
            'pre' => 'Thị trấn',
            'code' => 'w_tan_tuc',
          ],
          14 =>
          [
            'name' => 'Vĩnh Lộc A',
            'pre' => 'Xã',
            'code' => 'w_vinh_loc_a',
          ],
          15 =>
          [
            'name' => 'Vĩnh Lộc B',
            'pre' => 'Xã',
            'code' => 'w_vinh_loc_b',
          ],
        ],
      ],
      1 =>
      [
        'name' => 'Bình Tân',
        'code' => 'd_binh_tan',
        'pre' => 'Quận',
        'ward' =>
        [
          0 =>
          [
            'name' => 'An Lạc',
            'pre' => 'Phường',
            'code' => 'w_an_lac',
          ],
          1 =>
          [
            'name' => 'An Lạc A',
            'pre' => 'Phường',
            'code' => 'w_an_lac_a',
          ],
          2 =>
          [
            'name' => 'Bình Hưng Hòa',
            'pre' => 'Phường',
            'code' => 'w_binh_hung_hoa',
          ],
          3 =>
          [
            'name' => 'Bình Hưng Hòa A',
            'pre' => 'Phường',
            'code' => 'w_binh_hung_hoa_a',
          ],
          4 =>
          [
            'name' => 'Bình Hưng Hòa B',
            'pre' => 'Phường',
            'code' => 'w_binh_hung_hoa_b',
          ],
          5 =>
          [
            'name' => 'Bình Trị Đông',
            'pre' => 'Phường',
            'code' => 'w_binh_tri_dong',
          ],
          6 =>
          [
            'name' => 'Bình Trị Đông A',
            'pre' => 'Phường',
            'code' => 'w_binh_tri_dong_a',
          ],
          7 =>
          [
            'name' => 'Bình Trị Đông B',
            'pre' => 'Phường',
            'code' => 'w_binh_tri_dong_b',
          ],
          8 =>
          [
            'name' => 'Tân Tạo',
            'pre' => 'Phường',
            'code' => 'w_tan_tao',
          ],
          9 =>
          [
            'name' => 'Tân Tạo A',
            'pre' => 'Phường',
            'code' => 'w_tan_tao_a',
          ],
        ],
      ],
      2 =>
      [
        'name' => 'Bình Thạnh',
        'code' => 'd_binh_thanh',
        'pre' => 'Quận',
        'ward' =>
        [
          0 =>
          [
            'name' => '1',
            'pre' => 'Phường',
            'code' => 'w_1',
          ],
          1 =>
          [
            'name' => '11',
            'pre' => 'Phường',
            'code' => 'w_11',
          ],
          2 =>
          [
            'name' => '12',
            'pre' => 'Phường',
            'code' => 'w_12',
          ],
          3 =>
          [
            'name' => '13',
            'pre' => 'Phường',
            'code' => 'w_13',
          ],
          4 =>
          [
            'name' => '14',
            'pre' => 'Phường',
            'code' => 'w_14',
          ],
          5 =>
          [
            'name' => '15',
            'pre' => 'Phường',
            'code' => 'w_15',
          ],
          6 =>
          [
            'name' => '17',
            'pre' => 'Phường',
            'code' => 'w_17',
          ],
          7 =>
          [
            'name' => '19',
            'pre' => 'Phường',
            'code' => 'w_19',
          ],
          8 =>
          [
            'name' => '2',
            'pre' => 'Phường',
            'code' => 'w_2',
          ],
          9 =>
          [
            'name' => '21',
            'pre' => 'Phường',
            'code' => 'w_21',
          ],
          10 =>
          [
            'name' => '22',
            'pre' => 'Phường',
            'code' => 'w_22',
          ],
          11 =>
          [
            'name' => '24',
            'pre' => 'Phường',
            'code' => 'w_24',
          ],
          12 =>
          [
            'name' => '25',
            'pre' => 'Phường',
            'code' => 'w_25',
          ],
          13 =>
          [
            'name' => '26',
            'pre' => 'Phường',
            'code' => 'w_26',
          ],
          14 =>
          [
            'name' => '27',
            'pre' => 'Phường',
            'code' => 'w_27',
          ],
          15 =>
          [
            'name' => '28',
            'pre' => 'Phường',
            'code' => 'w_28',
          ],
          16 =>
          [
            'name' => '3',
            'pre' => 'Phường',
            'code' => 'w_3',
          ],
          17 =>
          [
            'name' => '5',
            'pre' => 'Phường',
            'code' => 'w_5',
          ],
          18 =>
          [
            'name' => '6',
            'pre' => 'Phường',
            'code' => 'w_6',
          ],
          19 =>
          [
            'name' => '7',
            'pre' => 'Phường',
            'code' => 'w_7',
          ],
        ],
      ],
      3 =>
      [
        'name' => 'Cần Giờ',
        'code' => 'd_can_gio',
        'pre' => 'Huyện',
        'ward' =>
        [
          0 =>
          [
            'name' => 'An Thới Đông',
            'pre' => 'Xã',
            'code' => 'w_an_thoi_dong',
          ],
          1 =>
          [
            'name' => 'Bình Khánh',
            'pre' => 'Xã',
            'code' => 'w_binh_khanh',
          ],
          2 =>
          [
            'name' => 'Cần Thạnh ',
            'pre' => 'Phường',
            'code' => 'w_can_thanh_',
          ],
          3 =>
          [
            'name' => 'Long Hòa',
            'pre' => 'Xã',
            'code' => 'w_long_hoa',
          ],
          4 =>
          [
            'name' => 'Lý Nhơn',
            'pre' => 'Xã',
            'code' => 'w_ly_nhon',
          ],
          5 =>
          [
            'name' => 'Tam Thôn Hiệp',
            'pre' => 'Xã',
            'code' => 'w_tam_thon_hiep',
          ],
          6 =>
          [
            'name' => 'Thạnh An',
            'pre' => 'Xã',
            'code' => 'w_thanh_an',
          ],
        ],
      ],
      4 =>
      [
        'name' => 'Củ Chi',
        'code' => 'd_cu_chi',
        'pre' => 'Huyện',
        'ward' =>
        [
          0 =>
          [
            'name' => 'An Nhơn Tây',
            'pre' => 'Xã',
            'code' => 'w_an_nhon_tay',
          ],
          1 =>
          [
            'name' => 'An Phú',
            'pre' => 'Xã',
            'code' => 'w_an_phu',
          ],
          2 =>
          [
            'name' => 'An Phú Trung',
            'pre' => 'Xã',
            'code' => 'w_an_phu_trung',
          ],
          3 =>
          [
            'name' => 'Bình Mỹ',
            'pre' => 'Xã',
            'code' => 'w_binh_my',
          ],
          4 =>
          [
            'name' => 'Củ Chi',
            'pre' => 'Thị trấn',
            'code' => 'w_cu_chi',
          ],
          5 =>
          [
            'name' => 'Hòa Phú',
            'pre' => 'Xã',
            'code' => 'w_hoa_phu',
          ],
          6 =>
          [
            'name' => 'Nhuận dức',
            'pre' => 'Xã',
            'code' => 'w_nhuan_duc',
          ],
          7 =>
          [
            'name' => 'Phạm Văn Cội',
            'pre' => 'Xã',
            'code' => 'w_pham_van_coi',
          ],
          8 =>
          [
            'name' => 'Phú Hòa Đông',
            'pre' => 'Xã',
            'code' => 'w_phu_hoa_dong',
          ],
          9 =>
          [
            'name' => 'Phú Mỹ Hưng',
            'pre' => 'Xã',
            'code' => 'w_phu_my_hung',
          ],
          10 =>
          [
            'name' => 'Phước Hiệp',
            'pre' => 'Xã',
            'code' => 'w_phuoc_hiep',
          ],
          11 =>
          [
            'name' => 'Phước Thạnh',
            'pre' => 'Xã',
            'code' => 'w_phuoc_thanh',
          ],
          12 =>
          [
            'name' => 'Phước Vĩnh An',
            'pre' => 'Xã',
            'code' => 'w_phuoc_vinh_an',
          ],
          13 =>
          [
            'name' => 'Tân An Hội',
            'pre' => 'Xã',
            'code' => 'w_tan_an_hoi',
          ],
          14 =>
          [
            'name' => 'Tân Phú Trung',
            'pre' => 'Xã',
            'code' => 'w_tan_phu_trung',
          ],
          15 =>
          [
            'name' => 'Tân Thạnh Đông',
            'pre' => 'Xã',
            'code' => 'w_tan_thanh_dong',
          ],
          16 =>
          [
            'name' => 'Tân Thạnh Tây',
            'pre' => 'Xã',
            'code' => 'w_tan_thanh_tay',
          ],
          17 =>
          [
            'name' => 'Tân Thông Hội',
            'pre' => 'Xã',
            'code' => 'w_tan_thong_hoi',
          ],
          18 =>
          [
            'name' => 'Thái Mỹ',
            'pre' => 'Xã',
            'code' => 'w_thai_my',
          ],
          19 =>
          [
            'name' => 'Trung An',
            'pre' => 'Xã',
            'code' => 'w_trung_an',
          ],
          20 =>
          [
            'name' => 'Trung Lập Hạ',
            'pre' => 'Xã',
            'code' => 'w_trung_lap_ha',
          ],
          21 =>
          [
            'name' => 'Trung Lập Hạ',
            'pre' => 'Xã',
            'code' => 'w_trung_lap_ha',
          ],
          22 =>
          [
            'name' => 'Trung Lập Thượng',
            'pre' => 'Xã',
            'code' => 'w_trung_lap_thuong',
          ],
        ],
      ],
      5 =>
      [
        'name' => 'Gò Vấp',
        'code' => 'd_go_vap',
        'pre' => 'Quận',
        'ward' =>
        [
          0 =>
          [
            'name' => '1',
            'pre' => 'Phường',
            'code' => 'w_1',
          ],
          1 =>
          [
            'name' => '10',
            'pre' => 'Phường',
            'code' => 'w_10',
          ],
          2 =>
          [
            'name' => '11',
            'pre' => 'Phường',
            'code' => 'w_11',
          ],
          3 =>
          [
            'name' => '12',
            'pre' => 'Phường',
            'code' => 'w_12',
          ],
          4 =>
          [
            'name' => '13',
            'pre' => 'Phường',
            'code' => 'w_13',
          ],
          5 =>
          [
            'name' => '14',
            'pre' => 'Phường',
            'code' => 'w_14',
          ],
          6 =>
          [
            'name' => '15',
            'pre' => 'Phường',
            'code' => 'w_15',
          ],
          7 =>
          [
            'name' => '16',
            'pre' => 'Phường',
            'code' => 'w_16',
          ],
          8 =>
          [
            'name' => '17',
            'pre' => 'Phường',
            'code' => 'w_17',
          ],
          9 =>
          [
            'name' => '3',
            'pre' => 'Phường',
            'code' => 'w_3',
          ],
          10 =>
          [
            'name' => '4',
            'pre' => 'Phường',
            'code' => 'w_4',
          ],
          11 =>
          [
            'name' => '5',
            'pre' => 'Phường',
            'code' => 'w_5',
          ],
          12 =>
          [
            'name' => '6',
            'pre' => 'Phường',
            'code' => 'w_6',
          ],
          13 =>
          [
            'name' => '7',
            'pre' => 'Phường',
            'code' => 'w_7',
          ],
          14 =>
          [
            'name' => '8',
            'pre' => 'Phường',
            'code' => 'w_8',
          ],
          15 =>
          [
            'name' => '9',
            'pre' => 'Phường',
            'code' => 'w_9',
          ],
        ],
      ],
      6 =>
      [
        'name' => 'Hóc Môn',
        'code' => 'd_hoc_mon',
        'pre' => 'Huyện',
        'ward' =>
        [
          0 =>
          [
            'name' => ' Đông Thạnh',
            'pre' => 'Xã',
            'code' => 'w__dong_thanh',
          ],
          1 =>
          [
            'name' => ' Hóc Môn',
            'pre' => 'Phường',
            'code' => 'w__hoc_mon',
          ],
          2 =>
          [
            'name' => 'Bà diểm',
            'pre' => 'Phường',
            'code' => 'w_ba_diem',
          ],
          3 =>
          [
            'name' => 'Nhị Bình',
            'pre' => 'Xã',
            'code' => 'w_nhi_binh',
          ],
          4 =>
          [
            'name' => 'Tân Hiệp',
            'pre' => 'Xã',
            'code' => 'w_tan_hiep',
          ],
          5 =>
          [
            'name' => 'Tân Thới Nhì',
            'pre' => 'Xã',
            'code' => 'w_tan_thoi_nhi',
          ],
          6 =>
          [
            'name' => 'Tân Xuân',
            'pre' => 'Xã',
            'code' => 'w_tan_xuan',
          ],
          7 =>
          [
            'name' => 'Thới Tam Thôn',
            'pre' => 'Xã',
            'code' => 'w_thoi_tam_thon',
          ],
          8 =>
          [
            'name' => 'Trung Chánh',
            'pre' => 'Xã',
            'code' => 'w_trung_chanh',
          ],
          9 =>
          [
            'name' => 'Xuân Thới Đông',
            'pre' => 'Xã',
            'code' => 'w_xuan_thoi_dong',
          ],
          10 =>
          [
            'name' => 'Xuân Thới Sơn',
            'pre' => 'Xã',
            'code' => 'w_xuan_thoi_son',
          ],
          11 =>
          [
            'name' => 'Xuân Thới Thượng',
            'pre' => 'Xã',
            'code' => 'w_xuan_thoi_thuong',
          ],
        ],
      ],
      7 =>
      [
        'name' => 'Nhà Bè',
        'code' => 'd_nha_be',
        'pre' => 'Huyện',
        'ward' =>
        [
          0 =>
          [
            'name' => 'Hiệp Phước',
            'pre' => 'Phường',
            'code' => 'w_hiep_phuoc',
          ],
          1 =>
          [
            'name' => 'Long Thới',
            'pre' => 'Xã',
            'code' => 'w_long_thoi',
          ],
          2 =>
          [
            'name' => 'Nhà Bè',
            'pre' => 'Thị trấn',
            'code' => 'w_nha_be',
          ],
          3 =>
          [
            'name' => 'Nhơn dức',
            'pre' => 'Xã',
            'code' => 'w_nhon_duc',
          ],
          4 =>
          [
            'name' => 'Phú Xuân',
            'pre' => 'Xã',
            'code' => 'w_phu_xuan',
          ],
          5 =>
          [
            'name' => 'Phước Kiển',
            'pre' => 'Xã',
            'code' => 'w_phuoc_kien',
          ],
          6 =>
          [
            'name' => 'Phước Lộc',
            'pre' => 'Xã',
            'code' => 'w_phuoc_loc',
          ],
        ],
      ],
      8 =>
      [
        'name' => 'Phú Nhuận',
        'code' => 'd_phu_nhuan',
        'pre' => 'Quận',
        'ward' =>
        [
          0 =>
          [
            'name' => '1',
            'pre' => 'Phường',
            'code' => 'w_1',
          ],
          1 =>
          [
            'name' => '10',
            'pre' => 'Phường',
            'code' => 'w_10',
          ],
          2 =>
          [
            'name' => '11',
            'pre' => 'Phường',
            'code' => 'w_11',
          ],
          3 =>
          [
            'name' => '12',
            'pre' => 'Phường',
            'code' => 'w_12',
          ],
          4 =>
          [
            'name' => '13',
            'pre' => 'Phường',
            'code' => 'w_13',
          ],
          5 =>
          [
            'name' => '14',
            'pre' => 'Phường',
            'code' => 'w_14',
          ],
          6 =>
          [
            'name' => '15',
            'pre' => 'Phường',
            'code' => 'w_15',
          ],
          7 =>
          [
            'name' => '17',
            'pre' => 'Phường',
            'code' => 'w_17',
          ],
          8 =>
          [
            'name' => '2',
            'pre' => 'Phường',
            'code' => 'w_2',
          ],
          9 =>
          [
            'name' => '25',
            'pre' => 'Phường',
            'code' => 'w_25',
          ],
          10 =>
          [
            'name' => '3',
            'pre' => 'Phường',
            'code' => 'w_3',
          ],
          11 =>
          [
            'name' => '4',
            'pre' => 'Phường',
            'code' => 'w_4',
          ],
          12 =>
          [
            'name' => '5',
            'pre' => 'Phường',
            'code' => 'w_5',
          ],
          13 =>
          [
            'name' => '6',
            'pre' => 'Phường',
            'code' => 'w_6',
          ],
          14 =>
          [
            'name' => '7',
            'pre' => 'Phường',
            'code' => 'w_7',
          ],
          15 =>
          [
            'name' => '8',
            'pre' => 'Phường',
            'code' => 'w_8',
          ],
          16 =>
          [
            'name' => '9',
            'pre' => 'Phường',
            'code' => 'w_9',
          ],
        ],
      ],
      9 =>
      [
        'name' => 'Quận 1',
        'code' => 'd_d1',
        'pre' => '',
        'ward' =>
        [
          0 =>
          [
            'name' => 'Bến Nghé',
            'pre' => 'Phường',
            'code' => 'w_ben_nghe',
          ],
          1 =>
          [
            'name' => 'Bến Thành',
            'pre' => 'Phường',
            'code' => 'w_ben_thanh',
          ],
          2 =>
          [
            'name' => 'Cầu Kho',
            'pre' => 'Phường',
            'code' => 'w_cau_kho',
          ],
          3 =>
          [
            'name' => 'Cầu Ông Lãnh',
            'pre' => 'Phường',
            'code' => 'w_cau_ong_lanh',
          ],
          4 =>
          [
            'name' => 'Cô Giang',
            'pre' => 'Phường',
            'code' => 'w_co_giang',
          ],
          5 =>
          [
            'name' => 'da Kao',
            'pre' => 'Phường',
            'code' => 'w_da_kao',
          ],
          6 =>
          [
            'name' => 'Nguyễn Cư Trinh',
            'pre' => 'Phường',
            'code' => 'w_nguyen_cu_trinh',
          ],
          7 =>
          [
            'name' => 'Nguyễn Thái Bình',
            'pre' => 'Phường',
            'code' => 'w_nguyen_thai_binh',
          ],
          8 =>
          [
            'name' => 'Phạm Ngũ Lão',
            'pre' => 'Phường',
            'code' => 'w_pham_ngu_lao',
          ],
          9 =>
          [
            'name' => 'Tân dịnh',
            'pre' => 'Phường',
            'code' => 'w_tan_dinh',
          ],
        ],
      ],
      10 =>
      [
        'name' => 'Quận 10',
        'code' => 'd10',
        'pre' => '',
        'ward' =>
        [
          0 =>
          [
            'name' => '1',
            'pre' => 'Phường',
            'code' => 'w_1',
          ],
          1 =>
          [
            'name' => '10',
            'pre' => 'Phường',
            'code' => 'w_10',
          ],
          2 =>
          [
            'name' => '11',
            'pre' => 'Phường',
            'code' => 'w_11',
          ],
          3 =>
          [
            'name' => '12',
            'pre' => 'Phường',
            'code' => 'w_12',
          ],
          4 =>
          [
            'name' => '13',
            'pre' => 'Phường',
            'code' => 'w_13',
          ],
          5 =>
          [
            'name' => '14',
            'pre' => 'Phường',
            'code' => 'w_14',
          ],
          6 =>
          [
            'name' => '15',
            'pre' => 'Phường',
            'code' => 'w_15',
          ],
          7 =>
          [
            'name' => '2',
            'pre' => 'Phường',
            'code' => 'w_2',
          ],
          8 =>
          [
            'name' => '3',
            'pre' => 'Phường',
            'code' => 'w_3',
          ],
          9 =>
          [
            'name' => '4',
            'pre' => 'Phường',
            'code' => 'w_4',
          ],
          10 =>
          [
            'name' => '5',
            'pre' => 'Phường',
            'code' => 'w_5',
          ],
          11 =>
          [
            'name' => '6',
            'pre' => 'Phường',
            'code' => 'w_6',
          ],
          12 =>
          [
            'name' => '7',
            'pre' => 'Phường',
            'code' => 'w_7',
          ],
          13 =>
          [
            'name' => '8',
            'pre' => 'Phường',
            'code' => 'w_8',
          ],
          14 =>
          [
            'name' => '9',
            'pre' => 'Phường',
            'code' => 'w_9',
          ],
        ],
      ],
      11 =>
      [
        'name' => 'Quận 11',
        'code' => 'd_d11',
        'pre' => '',
        'ward' =>
        [
          0 =>
          [
            'name' => '1',
            'pre' => 'Phường',
            'code' => 'w_1',
          ],
          1 =>
          [
            'name' => '10',
            'pre' => 'Phường',
            'code' => 'w_10',
          ],
          2 =>
          [
            'name' => '11',
            'pre' => 'Phường',
            'code' => 'w_11',
          ],
          3 =>
          [
            'name' => '12',
            'pre' => 'Phường',
            'code' => 'w_12',
          ],
          4 =>
          [
            'name' => '13',
            'pre' => 'Phường',
            'code' => 'w_13',
          ],
          5 =>
          [
            'name' => '14',
            'pre' => 'Phường',
            'code' => 'w_14',
          ],
          6 =>
          [
            'name' => '15',
            'pre' => 'Phường',
            'code' => 'w_15',
          ],
          7 =>
          [
            'name' => '16',
            'pre' => 'Phường',
            'code' => 'w_16',
          ],
          8 =>
          [
            'name' => '2',
            'pre' => 'Phường',
            'code' => 'w_2',
          ],
          9 =>
          [
            'name' => '3',
            'pre' => 'Phường',
            'code' => 'w_3',
          ],
          10 =>
          [
            'name' => '4',
            'pre' => 'Phường',
            'code' => 'w_4',
          ],
          11 =>
          [
            'name' => '5',
            'pre' => 'Phường',
            'code' => 'w_5',
          ],
          12 =>
          [
            'name' => '6',
            'pre' => 'Phường',
            'code' => 'w_6',
          ],
          13 =>
          [
            'name' => '7',
            'pre' => 'Phường',
            'code' => 'w_7',
          ],
          14 =>
          [
            'name' => '8',
            'pre' => 'Phường',
            'code' => 'w_8',
          ],
          15 =>
          [
            'name' => '9',
            'pre' => 'Phường',
            'code' => 'w_9',
          ],
        ],
      ],
      12 =>
      [
        'name' => 'Quận 12',
        'code' => 'd_d12',
        'pre' => '',
        'ward' =>
        [
          0 =>
          [
            'name' => 'An Phú Đông',
            'pre' => 'Phường',
            'code' => 'w_an_phu_dong',
          ],
          1 =>
          [
            'name' => 'Đông Hưng Thuận',
            'pre' => 'Phường',
            'code' => 'w_dong_hung_thuan',
          ],
          2 =>
          [
            'name' => 'Hiệp Thành',
            'pre' => 'Phường',
            'code' => 'w_hiep_thanh',
          ],
          3 =>
          [
            'name' => 'Tân Chánh Hiệp',
            'pre' => 'Phường',
            'code' => 'w_tan_chanh_hiep',
          ],
          4 =>
          [
            'name' => 'Tân Hưng Thuận',
            'pre' => 'Phường',
            'code' => 'w_tan_hung_thuan',
          ],
          5 =>
          [
            'name' => 'Tân Thới Hiệp',
            'pre' => 'Phường',
            'code' => 'w_tan_thoi_hiep',
          ],
          6 =>
          [
            'name' => 'Tân Thới Nhất',
            'pre' => 'Phường',
            'code' => 'w_tan_thoi_nhat',
          ],
          7 =>
          [
            'name' => 'Thạnh Lộc',
            'pre' => 'Phường',
            'code' => 'w_thanh_loc',
          ],
          8 =>
          [
            'name' => 'Thạnh Xuân',
            'pre' => 'Phường',
            'code' => 'w_thanh_xuan',
          ],
          9 =>
          [
            'name' => 'Thới An',
            'pre' => 'Phường',
            'code' => 'w_thoi_an',
          ],
          10 =>
          [
            'name' => 'Trung Mỹ Tây',
            'pre' => 'Phường',
            'code' => 'w_trung_my_tay',
          ],
        ],
      ],
      13 =>
      [
        'name' => 'Quận 2',
        'code' => 'd_d2',
        'pre' => '',
        'ward' =>
        [
          0 =>
          [
            'name' => ' Thạnh Mỹ Lợi',
            'pre' => 'Phường',
            'code' => 'w__thanh_my_loi',
          ],
          1 =>
          [
            'name' => 'An Khánh',
            'pre' => 'Phường',
            'code' => 'w_an_khanh',
          ],
          2 =>
          [
            'name' => 'An Lợi Đông',
            'pre' => 'Phường',
            'code' => 'w_an_loi_dong',
          ],
          3 =>
          [
            'name' => 'An Phú',
            'pre' => 'Phường',
            'code' => 'w_an_phu',
          ],
          4 =>
          [
            'name' => 'Bình An',
            'pre' => 'Phường',
            'code' => 'w_binh_an',
          ],
          5 =>
          [
            'name' => 'Bình Khánh',
            'pre' => 'Phường',
            'code' => 'w_binh_khanh',
          ],
          6 =>
          [
            'name' => 'Bình Trưng Đông',
            'pre' => 'Phường',
            'code' => 'w_binh_trung_dong',
          ],
          7 =>
          [
            'name' => 'Bình Trưng Tây',
            'pre' => 'Phường',
            'code' => 'w_binh_trung_tay',
          ],
          8 =>
          [
            'name' => 'Cát Lái',
            'pre' => 'Phường',
            'code' => 'w_cat_lai',
          ],
          9 =>
          [
            'name' => 'Thảo diền',
            'pre' => 'Phường',
            'code' => 'w_thao_dien',
          ],
          10 =>
          [
            'name' => 'Thủ Thiêm',
            'pre' => 'Phường',
            'code' => 'w_thu_thiem',
          ],
        ],
      ],
      14 =>
      [
        'name' => 'Quận 3',
        'code' => 'd_d3',
        'pre' => '',
        'ward' =>
        [
          0 =>
          [
            'name' => '1',
            'pre' => 'Phường',
            'code' => 'w_1',
          ],
          1 =>
          [
            'name' => '10',
            'pre' => 'Phường',
            'code' => 'w_10',
          ],
          2 =>
          [
            'name' => '11',
            'pre' => 'Phường',
            'code' => 'w_11',
          ],
          3 =>
          [
            'name' => '12',
            'pre' => 'Phường',
            'code' => 'w_12',
          ],
          4 =>
          [
            'name' => '13',
            'pre' => 'Phường',
            'code' => 'w_13',
          ],
          5 =>
          [
            'name' => '14',
            'pre' => 'Phường',
            'code' => 'w_14',
          ],
          6 =>
          [
            'name' => '2',
            'pre' => 'Phường',
            'code' => 'w_2',
          ],
          7 =>
          [
            'name' => '3',
            'pre' => 'Phường',
            'code' => 'w_3',
          ],
          8 =>
          [
            'name' => '4',
            'pre' => 'Phường',
            'code' => 'w_4',
          ],
          9 =>
          [
            'name' => '5',
            'pre' => 'Phường',
            'code' => 'w_5',
          ],
          10 =>
          [
            'name' => '6',
            'pre' => 'Phường',
            'code' => 'w_6',
          ],
          11 =>
          [
            'name' => '7',
            'pre' => 'Phường',
            'code' => 'w_7',
          ],
          12 =>
          [
            'name' => '8',
            'pre' => 'Phường',
            'code' => 'w_8',
          ],
          13 =>
          [
            'name' => '9',
            'pre' => 'Phường',
            'code' => 'w_9',
          ],
        ],
      ],
      15 =>
      [
        'name' => 'Quận 4',
        'code' => 'd_d4',
        'pre' => '',
        'ward' =>
        [
          0 =>
          [
            'name' => '1',
            'pre' => 'Phường',
            'code' => 'w_1',
          ],
          1 =>
          [
            'name' => '10',
            'pre' => 'Phường',
            'code' => 'w_10',
          ],
          2 =>
          [
            'name' => '12',
            'pre' => 'Phường',
            'code' => 'w_12',
          ],
          3 =>
          [
            'name' => '13',
            'pre' => 'Phường',
            'code' => 'w_13',
          ],
          4 =>
          [
            'name' => '14',
            'pre' => 'Phường',
            'code' => 'w_14',
          ],
          5 =>
          [
            'name' => '15',
            'pre' => 'Phường',
            'code' => 'w_15',
          ],
          6 =>
          [
            'name' => '16',
            'pre' => 'Phường',
            'code' => 'w_16',
          ],
          7 =>
          [
            'name' => '18',
            'pre' => 'Phường',
            'code' => 'w_18',
          ],
          8 =>
          [
            'name' => '2',
            'pre' => 'Phường',
            'code' => 'w_2',
          ],
          9 =>
          [
            'name' => '3',
            'pre' => 'Phường',
            'code' => 'w_3',
          ],
          10 =>
          [
            'name' => '4',
            'pre' => 'Phường',
            'code' => 'w_4',
          ],
          11 =>
          [
            'name' => '5',
            'pre' => 'Phường',
            'code' => 'w_5',
          ],
          12 =>
          [
            'name' => '6',
            'pre' => 'Phường',
            'code' => 'w_6',
          ],
          13 =>
          [
            'name' => '8',
            'pre' => 'Phường',
            'code' => 'w_8',
          ],
          14 =>
          [
            'name' => '9',
            'pre' => 'Phường',
            'code' => 'w_9',
          ],
        ],
      ],
      16 =>
      [
        'name' => 'Quận 5',
        'code' => 'd_d5',
        'pre' => '',
        'ward' =>
        [
          0 =>
          [
            'name' => '1',
            'pre' => 'Phường',
            'code' => 'w_1',
          ],
          1 =>
          [
            'name' => '10',
            'pre' => 'Phường',
            'code' => 'w_10',
          ],
          2 =>
          [
            'name' => '11',
            'pre' => 'Phường',
            'code' => 'w_11',
          ],
          3 =>
          [
            'name' => '12',
            'pre' => 'Phường',
            'code' => 'w_12',
          ],
          4 =>
          [
            'name' => '13',
            'pre' => 'Phường',
            'code' => 'w_13',
          ],
          5 =>
          [
            'name' => '14',
            'pre' => 'Phường',
            'code' => 'w_14',
          ],
          6 =>
          [
            'name' => '15',
            'pre' => 'Phường',
            'code' => 'w_15',
          ],
          7 =>
          [
            'name' => '2',
            'pre' => 'Phường',
            'code' => 'w_2',
          ],
          8 =>
          [
            'name' => '3',
            'pre' => 'Phường',
            'code' => 'w_3',
          ],
          9 =>
          [
            'name' => '4',
            'pre' => 'Phường',
            'code' => 'w_4',
          ],
          10 =>
          [
            'name' => '5',
            'pre' => 'Phường',
            'code' => 'w_5',
          ],
          11 =>
          [
            'name' => '6',
            'pre' => 'Phường',
            'code' => 'w_6',
          ],
          12 =>
          [
            'name' => '7',
            'pre' => 'Phường',
            'code' => 'w_7',
          ],
          13 =>
          [
            'name' => '8',
            'pre' => 'Phường',
            'code' => 'w_8',
          ],
          14 =>
          [
            'name' => '9',
            'pre' => 'Phường',
            'code' => 'w_9',
          ],
        ],
      ],
      17 =>
      [
        'name' => 'Quận 6',
        'code' => 'd_d6',
        'pre' => '',
        'ward' =>
        [
          0 =>
          [
            'name' => '1',
            'pre' => 'Phường',
            'code' => 'w_1',
          ],
          1 =>
          [
            'name' => '10',
            'pre' => 'Phường',
            'code' => 'w_10',
          ],
          2 =>
          [
            'name' => '11',
            'pre' => 'Phường',
            'code' => 'w_11',
          ],
          3 =>
          [
            'name' => '12',
            'pre' => 'Phường',
            'code' => 'w_12',
          ],
          4 =>
          [
            'name' => '13',
            'pre' => 'Phường',
            'code' => 'w_13',
          ],
          5 =>
          [
            'name' => '14',
            'pre' => 'Phường',
            'code' => 'w_14',
          ],
          6 =>
          [
            'name' => '2',
            'pre' => 'Phường',
            'code' => 'w_2',
          ],
          7 =>
          [
            'name' => '3',
            'pre' => 'Phường',
            'code' => 'w_3',
          ],
          8 =>
          [
            'name' => '4',
            'pre' => 'Phường',
            'code' => 'w_4',
          ],
          9 =>
          [
            'name' => '5',
            'pre' => 'Phường',
            'code' => 'w_5',
          ],
          10 =>
          [
            'name' => '6',
            'pre' => 'Phường',
            'code' => 'w_6',
          ],
          11 =>
          [
            'name' => '7',
            'pre' => 'Phường',
            'code' => 'w_7',
          ],
          12 =>
          [
            'name' => '8',
            'pre' => 'Phường',
            'code' => 'w_8',
          ],
          13 =>
          [
            'name' => '9',
            'pre' => 'Phường',
            'code' => 'w_9',
          ],
        ],
      ],
      18 =>
      [
        'name' => 'Quận 7',
        'code' => 'd_d7',
        'pre' => '',
        'ward' =>
        [
          0 =>
          [
            'name' => 'Bình Thuận',
            'pre' => 'Phường',
            'code' => 'w_binh_thuan',
          ],
          1 =>
          [
            'name' => 'Phú Mỹ',
            'pre' => 'Phường',
            'code' => 'w_phu_my',
          ],
          2 =>
          [
            'name' => 'Phú Thuận',
            'pre' => 'Phường',
            'code' => 'w_phu_thuan',
          ],
          3 =>
          [
            'name' => 'Tân Hưng',
            'pre' => 'Phường',
            'code' => 'w_tan_hung',
          ],
          4 =>
          [
            'name' => 'Tân Kiểng',
            'pre' => 'Phường',
            'code' => 'w_tan_kieng',
          ],
          5 =>
          [
            'name' => 'Tân Phong',
            'pre' => 'Phường',
            'code' => 'w_tan_phong',
          ],
          6 =>
          [
            'name' => 'Tân Phú',
            'pre' => 'Phường',
            'code' => 'w_tan_phu',
          ],
          7 =>
          [
            'name' => 'Tân Quy',
            'pre' => 'Phường',
            'code' => 'w_tan_quy',
          ],
          8 =>
          [
            'name' => 'Tân Thuận Đông',
            'pre' => 'Phường',
            'code' => 'w_tan_thuan_dong',
          ],
          9 =>
          [
            'name' => 'Tân Thuận Tây',
            'pre' => 'Phường',
            'code' => 'w_tan_thuan_tay',
          ],
        ],
      ],
      19 =>
      [
        'name' => 'Quận 8',
        'code' => 'd_d8',
        'pre' => '',
        'ward' =>
        [
          0 =>
          [
            'name' => '1',
            'pre' => 'Phường',
            'code' => 'w_1',
          ],
          1 =>
          [
            'name' => '10',
            'pre' => 'Phường',
            'code' => 'w_10',
          ],
          2 =>
          [
            'name' => '11',
            'pre' => 'Phường',
            'code' => 'w_11',
          ],
          3 =>
          [
            'name' => '12',
            'pre' => 'Phường',
            'code' => 'w_12',
          ],
          4 =>
          [
            'name' => '13',
            'pre' => 'Phường',
            'code' => 'w_13',
          ],
          5 =>
          [
            'name' => '14',
            'pre' => 'Phường',
            'code' => 'w_14',
          ],
          6 =>
          [
            'name' => '15',
            'pre' => 'Phường',
            'code' => 'w_15',
          ],
          7 =>
          [
            'name' => '16',
            'pre' => 'Phường',
            'code' => 'w_16',
          ],
          8 =>
          [
            'name' => '2',
            'pre' => 'Phường',
            'code' => 'w_2',
          ],
          9 =>
          [
            'name' => '3',
            'pre' => 'Phường',
            'code' => 'w_3',
          ],
          10 =>
          [
            'name' => '4',
            'pre' => 'Phường',
            'code' => 'w_4',
          ],
          11 =>
          [
            'name' => '5',
            'pre' => 'Phường',
            'code' => 'w_5',
          ],
          12 =>
          [
            'name' => '6',
            'pre' => 'Phường',
            'code' => 'w_6',
          ],
          13 =>
          [
            'name' => '7',
            'pre' => 'Phường',
            'code' => 'w_7',
          ],
          14 =>
          [
            'name' => '8',
            'pre' => 'Phường',
            'code' => 'w_8',
          ],
          15 =>
          [
            'name' => '9',
            'pre' => 'Phường',
            'code' => 'w_9',
          ],
        ],
      ],
      20 =>
      [
        'name' => 'Quận 9',
        'code' => 'd_d9',
        'pre' => '',
        'ward' =>
        [
          0 =>
          [
            'name' => 'Hiệp Phú',
            'pre' => 'Phường',
            'code' => 'w_hiep_phu',
          ],
          1 =>
          [
            'name' => 'Long Bình',
            'pre' => 'Phường',
            'code' => 'w_long_binh',
          ],
          2 =>
          [
            'name' => 'Long Phước',
            'pre' => 'Phường',
            'code' => 'w_long_phuoc',
          ],
          3 =>
          [
            'name' => 'Long Thạnh Mỹ',
            'pre' => 'Phường',
            'code' => 'w_long_thanh_my',
          ],
          4 =>
          [
            'name' => 'Long Trường',
            'pre' => 'Phường',
            'code' => 'w_long_truong',
          ],
          5 =>
          [
            'name' => 'Phú Hữu',
            'pre' => 'Phường',
            'code' => 'w_phu_huu',
          ],
          6 =>
          [
            'name' => 'Phước Bình',
            'pre' => 'Phường',
            'code' => 'w_phuoc_binh',
          ],
          7 =>
          [
            'name' => 'Phước Long A',
            'pre' => 'Phường',
            'code' => 'w_phuoc_long_a',
          ],
          8 =>
          [
            'name' => 'Phước Long B',
            'pre' => 'Phường',
            'code' => 'w_phuoc_long_b',
          ],
          9 =>
          [
            'name' => 'Tân Phú',
            'pre' => 'Phường',
            'code' => 'w_tan_phu',
          ],
          10 =>
          [
            'name' => 'Tăng Nhơn Phú A',
            'pre' => 'Phường',
            'code' => 'w_tang_nhon_phu_a',
          ],
          11 =>
          [
            'name' => 'Tăng Nhơn Phú B',
            'pre' => 'Phường',
            'code' => 'w_tang_nhon_phu_b',
          ],
          12 =>
          [
            'name' => 'Trường Thạnh',
            'pre' => 'Phường',
            'code' => 'w_truong_thanh',
          ],
        ],
      ],
      21 =>
      [
        'name' => 'Tân Bình',
        'code' => 'd_tan_binh',
        'pre' => 'Quận',
        'ward' =>
        [
          0 =>
          [
            'name' => '1',
            'pre' => 'Phường',
            'code' => 'w_1',
          ],
          1 =>
          [
            'name' => '10',
            'pre' => 'Phường',
            'code' => 'w_10',
          ],
          2 =>
          [
            'name' => '11',
            'pre' => 'Phường',
            'code' => 'w_11',
          ],
          3 =>
          [
            'name' => '12',
            'pre' => 'Phường',
            'code' => 'w_12',
          ],
          4 =>
          [
            'name' => '13',
            'pre' => 'Phường',
            'code' => 'w_13',
          ],
          5 =>
          [
            'name' => '14',
            'pre' => 'Phường',
            'code' => 'w_14',
          ],
          6 =>
          [
            'name' => '15',
            'pre' => 'Phường',
            'code' => 'w_15',
          ],
          7 =>
          [
            'name' => '2',
            'pre' => 'Phường',
            'code' => 'w_2',
          ],
          8 =>
          [
            'name' => '3',
            'pre' => 'Phường',
            'code' => 'w_3',
          ],
          9 =>
          [
            'name' => '4',
            'pre' => 'Phường',
            'code' => 'w_4',
          ],
          10 =>
          [
            'name' => '5',
            'pre' => 'Phường',
            'code' => 'w_5',
          ],
          11 =>
          [
            'name' => '6',
            'pre' => 'Phường',
            'code' => 'w_6',
          ],
          12 =>
          [
            'name' => '7',
            'pre' => 'Phường',
            'code' => 'w_7',
          ],
          13 =>
          [
            'name' => '8',
            'pre' => 'Phường',
            'code' => 'w_8',
          ],
          14 =>
          [
            'name' => '9',
            'pre' => 'Phường',
            'code' => 'w_9',
          ],
        ],
      ],
      22 =>
      [
        'name' => 'Tân Phú',
        'code' => 'd_tan_phu',
        'pre' => 'Quận',
        'ward' =>
        [
          0 =>
          [
            'name' => 'Hiệp Tân',
            'pre' => 'Phường',
            'code' => 'w_hiep_tan',
          ],
          1 =>
          [
            'name' => 'Hòa Thạnh',
            'pre' => 'Phường',
            'code' => 'w_hoa_thanh',
          ],
          2 =>
          [
            'name' => 'Phú Thạnh',
            'pre' => 'Phường',
            'code' => 'w_phu_thanh',
          ],
          3 =>
          [
            'name' => 'Phú Thọ Hòa',
            'pre' => 'Phường',
            'code' => 'w_phu_tho_hoa',
          ],
          4 =>
          [
            'name' => 'Phú Trung',
            'pre' => 'Phường',
            'code' => 'w_phu_trung',
          ],
          5 =>
          [
            'name' => 'Sơn Kỳ',
            'pre' => 'Phường',
            'code' => 'w_son_ky',
          ],
          6 =>
          [
            'name' => 'Tân Quý',
            'pre' => 'Phường',
            'code' => 'w_tan_quy',
          ],
          7 =>
          [
            'name' => 'Tân Sơn Nhì',
            'pre' => 'Phường',
            'code' => 'w_tan_son_nhi',
          ],
          8 =>
          [
            'name' => 'Tân Thành',
            'pre' => 'Phường',
            'code' => 'w_tan_thanh',
          ],
          9 =>
          [
            'name' => 'Tân Thới Hòa',
            'pre' => 'Phường',
            'code' => 'w_tan_thoi_hoa',
          ],
          10 =>
          [
            'name' => 'Tây Thạnh',
            'pre' => 'Phường',
            'code' => 'w_tay_thanh',
          ],
        ],
      ],
      23 =>
      [
        'name' => 'Thủ dức',
        'code' => 'd_thu_duc',
        'pre' => 'Quận',
        'ward' =>
        [
          0 =>
          [
            'name' => 'Bình Chiểu',
            'pre' => 'Phường',
            'code' => 'w_binh_chieu',
          ],
          1 =>
          [
            'name' => 'Bình Thọ',
            'pre' => 'Phường',
            'code' => 'w_binh_tho',
          ],
          2 =>
          [
            'name' => 'Hiệp Bình Chánh',
            'pre' => 'Phường',
            'code' => 'w_hiep_binh_chanh',
          ],
          3 =>
          [
            'name' => 'Hiệp Bình Phước',
            'pre' => 'Phường',
            'code' => 'w_hiep_binh_phuoc',
          ],
          4 =>
          [
            'name' => 'Linh Chiểu',
            'pre' => 'Phường',
            'code' => 'w_linh_chieu',
          ],
          5 =>
          [
            'name' => 'Linh Đông',
            'pre' => 'Phường',
            'code' => 'w_linh_dong',
          ],
          6 =>
          [
            'name' => 'Linh Tây',
            'pre' => 'Phường',
            'code' => 'w_linh_tay',
          ],
          7 =>
          [
            'name' => 'Linh Trung',
            'pre' => 'Phường',
            'code' => 'w_linh_trung',
          ],
          8 =>
          [
            'name' => 'Linh Xuân',
            'pre' => 'Phường',
            'code' => 'w_linh_xuan',
          ],
          9 =>
          [
            'name' => 'Tam Bình',
            'pre' => 'Phường',
            'code' => 'w_tam_binh',
          ],
          10 =>
          [
            'name' => 'Tam Phú',
            'pre' => 'Phường',
            'code' => 'w_tam_phu',
          ],
          11 =>
          [
            'name' => 'Trường Thọ',
            'pre' => 'Phường',
            'code' => 'w_truong_tho',
          ],
        ],
      ],
    ],
  ];
}

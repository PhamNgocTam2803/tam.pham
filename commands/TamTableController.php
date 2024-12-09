<?php

namespace app\commands;

use yii\console\Controller;
use app\models\Tamtable; // Đảm bảo bạn đã có model TamTable ánh xạ với bảng tamtable
use yii\console\ExitCode;

class TamTableController extends Controller
{
    /**
     * Lệnh này sẽ hiển thị toàn bộ dữ liệu từ bảng tamtable
     */
    public function actionIndex()
    {
        // Lấy tất cả dữ liệu từ bảng tamtable
        $records = Tamtable::find()->all();

        // Kiểm tra nếu có dữ liệu
        if (empty($records)) {
            echo "Không có dữ liệu trong bảng tamtable.\n";
            return ExitCode::OK;
        }

        // In tiêu đề cột
        echo "ID | Name | Email | Subject | Body\n";
        echo "--------------------------------------\n";

        // Hiển thị từng dòng dữ liệu
        foreach ($records as $record) {
            echo $record->id . " | " . $record->name . " | " . $record->email . " | " . $record->subject . " | " . $record->body . "\n";
        }

        return ExitCode::OK;
    }
}

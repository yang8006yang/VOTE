# 功能分析

前端 (首頁)
---
功能1. 登入 --> 一般使用者 / 管理員

功能2. 註冊 --> 一般使用者

功能3. 預覽部分資料(投票主題/新進歌曲)

功能4. 導覽列 (ABOUT、CONTACT、CENTER、NEWS)

功能5. 公告跑馬燈


前端(會員中心)
---
功能1. 投票列表 (分類顯示/投票/查看投過的票/查看投票結果)

功能2. 歌曲列表 (點擊連結/加入播放清單)

功能3. 播放清單 (建立/刪除/刪除清單內歌曲)

功能4. 查詢 投票主題/歌曲/播放清單


後端(管理中心)
---
功能1. 投票列表 (創建投票主題/編輯投票(啟用/刪除)/查看投票結果)

功能2. 歌曲列表 (新增/刪除/修改/上架)

功能3. 會員中心 (顯示會員列表/管理員設定)

功能4. 查詢 投票主題/歌曲/播放清單 

---

# 資料表設計

### USERS
>使用者
>
| 欄位名    | 資料型態  |   主鍵   |   預設值  | 自動遞增| 備註 |
| -------- | -------- | --------| -------- | ------| -----|
| id       | int      |    O    |          | O     |      |
| acc      | Text     |   X     |          | x     |      |
| pw       | Text     |   X     |          | x     |      |
| email    | Text     |   X     |          | x     |      |
|last_login|Timestamp|   X     |          | x     |      |
|  name    | Text     |   X     |          | x     |      |
|  level   | TinyInt   |   X     |    1     | x     |      |



### VOTE
>投票主題
>
| 欄位名    | 資料型態  |   主鍵   |   預設值  | 自動遞增| 備註 |
| -------- | -------- | --------| -------- | ------| -----|
| id       | int      |   O     |          | O     |      |
| subject  | Text     |   X     |          | x     |      |
| text     | Text     |   X     |          | x     |content|
| vote     | int(10)  |   X     |          | x     |      |
| type     | Tinyint  |   X     |          | x     |      |
| creat    |Timestamp |   X     |          | x     |      |
| update   |Timestamp |   X     |          | x     |      |
| active   | TinyInt  |   X     |    0     | x     |      |

>投票選項
>
| 欄位名    | 資料型態  |   主鍵   |   預設值  | 自動遞增| 備註 |
| -------- | -------- | --------| -------- | ------| -----|
| id       | int      |   O     |          | O     |      |
|subject_id| int      |▲(主題主鍵)|          | x     |      |
| opt      | Text     |   X     |          | x     |      |
| vote     | int      |   X     |          | x     |      |
| creat    |Timestamp |   X     |          | x     |      |
| update   |Timestamp |   X     |          | x     |      |

>投票紀錄

| 欄位名    | 資料型態  |   主鍵   |   預設值  | 自動遞增| 備註 |
| -------- | -------- | --------| -------- | ------| -----|
| id       | int      |   O     |          | O     |      |
|user      | int      |▲(使用者主鍵)|        | x     |      |
| ip       | Text     |   X     |          | x     |      |
|subject_id| int      |▲(主題主鍵)|          | x     |      |
|opt_id    | int      |▲(選項主鍵)|          | x     |      |
| creat    |Timestamp |   X     |          | x     |      |

### PLAYLIST
>歌曲
>
| 欄位名    | 資料型態  |   主鍵   |   預設值  | 自動遞增| 備註 |
| -------- | -------- | --------| -------- | ------| -----|
| id       | int      |   O     |          | O     |      |
| song_name| Text     |   X     |          | x     |      |
|description| Text    |   X     |          | x     |content|
| singer   | Text     |   X     |          | x     |      |
| YT-link  | Text     |   X     |          | x     |      |
| PIC      | Text     |   X     |          | x     |      |
| type     | Tinyint  |   X     |          | x     |      |
| creat    |Timestamp |   X     |          | x     |      |
| update   |Timestamp |   X     |          | x     |      |
| active   | TinyInt  |   X     |    0     | x     |      |

>播放清單

| 欄位名    | 資料型態  |   主鍵   |   預設值  | 自動遞增| 備註 |
| -------- | -------- | --------| -------- | ------| -----|
| id       | int      |   O     |          | O     |      |
| list_name| Text     |   X     |          | x     |      |
|description| Text    |   X     |          | x     |content|
| user     | int      |▲(使用者主鍵)|          | x     |      |
| creat    |Timestamp |   X     |          | x     |      |
| update   |Timestamp |   X     |          | x     |      |


>播放歌曲清單

| 欄位名    | 資料型態  |   主鍵   |   預設值  | 自動遞增| 備註 |
| -------- | -------- | --------| -------- | ------| -----|
| id       | int      |   O     |          | O     |      |
| playlist_id| int    |▲(清單主鍵)|          | x     |      |
| song_id  | Text     |▲(歌曲主鍵)|          | x     |      |

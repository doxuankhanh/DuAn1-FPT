-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 17, 2023 lúc 03:43 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authors`
--

CREATE TABLE `authors` (
  `authorID` int(11) NOT NULL,
  `authorName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `authors`
--

INSERT INTO `authors` (`authorID`, `authorName`) VALUES
(1, 'Hugh Howey'),
(2, 'Oliver Burkeman'),
(3, 'Seonghyeok Park'),
(4, 'Ben Wilson'),
(5, 'Patrick Modiano'),
(6, 'John Boyne'),
(7, 'Ngọc (Bi) Nguyễn'),
(8, 'Neil Gaiman,Terry Pratchett'),
(9, 'Ocean Vuong'),
(10, 'Sophie De Mullenheim'),
(11, 'Huỳnh Mai Liên'),
(12, 'Trần Vàng Sao'),
(13, 'Nguyễn Tuân'),
(14, 'Sato Tsutomu'),
(15, 'Thăng Fly Comics'),
(16, 'Ngô Tất Tố'),
(17, 'Trần Dần'),
(18, 'Sarah Andersen'),
(19, 'Susie Morgenstern'),
(20, 'Valérie Perrin'),
(21, 'Cecelia Ahern'),
(22, 'Ứng Hòe Nguyễn Văn Tố'),
(23, 'Trần Trọng Kim');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `cateID` varchar(255) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `authorID` int(10) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `view` int(10) DEFAULT 0,
  `statusID` int(11) DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `cateID`, `bookName`, `image`, `authorID`, `dateAdded`, `price`, `description`, `view`, `statusID`) VALUES
(8, '1', 'Len Chùi - Silo Tháp Giống', 'sach1.jpg', 1, '2023-03-17 03:34:24', 214000, 'Có những sự thật sẽ giết chết ta.  Một thế giới hậu tận thế trong tương lai, khô cằn, tàn nhẫn, chết chóc. Ở đó, con người sống cùng nhau, hàng bao thế hệ, trong một tòa tháp đâm sâu vào lòng đất. Khung cảnh bên ngoài chỉ còn là những điểm ảnh, gói gọn trong một màn hình chiếu. Những câu chuyện, ước ao về vùng đất ngoài kia trở thành đề tài cấm kỵ. Nhưng như lẽ thường phải thế, luôn có những kẻ nuôi hy vọng, giấc mơ, những kẻ mang trong mình niềm lạc quan có thể lây lan cho những cư dân khác. Hình phạt cho chúng chỉ có một: chúng bị tống đi lau chùi các cảm biến bên ngoài tháp giống.  Và đó sẽ là chuyến đi không đường trở lại.  Khi cảnh sát trưởng của tháp giống phạm phải tội lỗi không thể tha thứ ấy, Juliette, một thợ máy ở bộ phận Cơ Khí, trở thành người kế nhiệm bất đắc dĩ. Cô không biết rằng mình sắp trở thành nhân tố cuối cùng, góp phần đưa tháp giống đến với bước ngoặt quyết định sự tồn vong hay tuyệt diện của nó.', 57, 2),
(10, '15', 'Tích Cực Có Chừng Mực', 'sach2.jpg', 5, '2023-03-17 14:03:36', 116000, 'Một cách tiếp cận hoàn toàn mới mà với tự lực:  thành công nhờ thất bại, bình thản khi chấp nhận lo âu.  Nền văn minh ngày nay đề cao hạnh phúc, mà để đạt được hạnh phúc, theo phần lớn sách tự lực nhan nhản khắp nơi, ta chỉ cần suy nghĩ tích cực, xóa bỏ bóng ma của nỗi buồn và thất bại khỏi tâm trí. Thế nhưng đời sống hiện đại dù mang đến nhiều tiện ích nhưng trong số đó lại có quá ít thứ làm chúng ta vui lên được. Vậy có phải chúng ta đang đuổi theo một thứ phù phiếm? Hay chỉ đơn giản là đi sai đường rồi?  Qua những trang sách này, ta được làm quen với một lối tư duy đáng kinh ngạc về tâm lý con người: trong đời sống cá nhân nói riêng và trong xã hội nói chung, chính nỗ lực không ngừng nhằm kiếm tìm hạnh phúc đã khiến chúng ta khốn khổ. Để đạt được hạnh phúc và thành công, ta phải học cách chấp nhận thất bại, suy nghĩ bi quan, làm quen với cảm giác bất an và bấp bênh - chính những thứ mà chúng ta dành cả đời để tìm cách lẩn tránh. Một cuốn sách khác thường, gợi lên nhiều suy ngẫm và tràn đầy lạc quan trong những lời ngợi ca sức mạnh của tư duy tiêu cực, Tích cực có chừng mực là bí kíp giúp người thông thái hiểu được khái niệm hạnh phúc vốn bị ngộ nhận bấy lâu nay.', 234, 1),
(11, '10', 'Khi Học Tập Là Niềm Vui', 'sach3.jpg', 3, '2023-03-17 04:52:56', 126000, 'Ngồi vào bàn nhưng chẳng thể tập trung? Dù sắp tới kỳ thi nhưng vẫn khó lòng chấn chỉnh tỉnh thần? Biết tiếng Anh quan trọng nhưng không tìm nổi động lực học.  Bạn thấy việc học nhằm chăn, phiền phức do mình không có điều kiện thuận lợi, không có hoàn cảnh phù hợp, không có môi trường yên tĩnh?  Không đâu, hoàn toàn không phải vậy.  Nguyên nhân thật sự khiến bạn không học nối chính là do chưa nắm rõ mục đích và ý nghĩa của việc học.  Trong cuốn Khi học tập hóa niềm vui, bằng trải nghiệm của bản thân, tác giả đã chỉ ra cho chúng ta một chân lý quý giá mà ít người biết đến: hiểu được vì sao mình cần học, ai cũng có thể tìm thấy niềm vui trong việc học và học một cách hiệu quả.  Thay vì đưa ra một bí kíp học tập hay phương pháp luận vĩ đại, tác giả dùng câu chuyện của chính mình cũng như tấm gương của những người thành công trên toàn thế giới để hướng dẫn chúng ta cách rèn luyện ý chí tinh thần - bởi, chỉ có tinh thần bền bỉ, ý chí kiên cường, ta mới có thể học và học tốt. Bên cạnh những lời khuyên hữu ích về phương pháp học bằng toàn bộ tâm trí, 7 thói quen của người ham học hay cách giữ vững tinh thần trong lúc học.... tác giả còn gửi đến các bạn độc giả - đặc biệt là các em thanh thiếu niên đang phải vật lộn với học hành thi cử - những lời động viên chân thành giúp bạn vững bước trên đường học dài lâu.  Nào, đừng chần chừ gì nữa, hãy mở cuốn sách ra để tìm kiếm khoảnh khắc học tập hóa niềm vui trong chính bạn!', 66, 1),
(16, '20', 'Metropolis (Lịch sử phát triển đô thị, phát minh lớn nhất của loài người)', 'sach4.jpg', 4, '2023-03-17 14:04:38', 320000, 'Chúng ta đang chứng kiến cuộc di dân vĩ đại nhất trong lịch sử, đỉnh điểm của một quá trình kéo dài 6.000 năm, một quá trình mà theo đó, đến cuối thế kỷ này, chúng ta sẽ trở thành một chủng loại được đô thị hóa.  Dưới sự dẫn dắt của nhà sử học Ben Wilson, chúng ta sẽ đi vào một hành trình đầy màu sắc xuyên suốt 6.000 năm và 26 thành phố trên thế giới để thấy cuộc sống đô thị đã trở thành động lực và ươm mầm cho những phát kiến vĩ đại nhất của loài người như thế nào.  Trong suốt thời gian tồn tại của loài người, không có gì đã định hình chúng ta sâu sắc hơn đô thị. Ben Wilson đã kể câu chuyện vĩ đại và huy hoàng về cách mà cuộc sống đô thị cho phép nền văn hóa nhân loại phát triển. Ông cho chúng ta thấy rằng các đô thị không bao giờ là điều cần thiết nhưng một khi chúng tồn tại, mật độ của chúng đã tạo ra sự nở rộ nỗ lực của con người - sẳn xuất các ngành nghề mới, các loại hình nghệ thuật, thờ cúng và thương mại - mà chúng khởi đầu không kém gì nền văn minh.', 53, 1),
(17, '1', 'Chú bé mang pyjama sọc', 'sach5.jpg', 5, '2023-03-17 09:19:04', 63000, 'Rất khó miêu tả câu chuyện về Chú bé mang pyjama sọc này. Thường thì chúng tôi vẫn tiết lộ vài chi tiết về cuốn sách trên bìa, nhưng trong trường hợp này chúng tôi nghĩ làm như vậy sẽ làm hỏng cảm giác đọc của bạn. Chúng tôi nghĩ điều quan trọng là bạn nên đọc mà không biết trước nó kể về điều gì. Nếu bạn định bắt đầu đọc cuốn sách thật, bạn sẽ cùng được trải qua một hành trình với một cậu bé chín tuổi tên là Bruno (dù đây không hẳn là sách cho trẻ chín tuổi). Và chẳng sớm thì muộn bạn sẽ cùng Bruno đến một hàng rào. Những hàng rào như vậy vẫn tồn tại ở khắp nơi trên thế giới. Chúng tôi hy vọng không ai trong chúng ta phải vượt qua một hàng rào như vậy trong đời.', 28, 1),
(18, '1', 'Đi tìm Dora', 'sach6.jpg', 6, '2023-03-17 04:46:47', 68000, 'Đi tìm Dora mở ra là cảnh Patrick Modiano bắt gặp một mẩu tin tìm người thân trong tờ nhật báo cũ ra năm 1941. Dora Bruder, cô gái 15 tuổi gốc Do Thái, một người hoàn toàn xa lạ, lại cuốn hút ông lao vào cuộc truy tìm mọi manh mối liên quan đến cô vào cái mùa đông Paris lạnh giá thời Thế chiến thứ hai.  Thông qua những mảnh vỡ quá khứ của Dora Bruder, Patrick Modiano gợi lại thời kỳ Paris bị Đức Quốc xã chiếm đóng, nơi bao cuộc đời, bao câu chuyện bị chôn vùi, để từ đó biến bản tổng hợp tư liệu lịch sử này thành suy ngẫm cá nhân của ông về sự mất mát, cả trong ký ức và những kỷ niệm.', 11, 1),
(19, '1', 'Đám trẻ nhiễu văn hóa', 'sach7.jpg', 7, '2023-03-17 03:34:39', 95000, 'Sinh ra ở Moscow bởi bố mẹ người Việt Nam nhưng lại tin rằng mình có phần nào đó là người Xô viết, chuyển về Hà Nội khi lên 3 và vào học trường Quốc tế Pháp dưới sự ủng hộ của ông bà, 15 tuổi rời Việt Nam sang Mỹ để học tại một trường nội trú ở tiểu bang Connecticut, câu hỏi mà Ngọc Nguyễn, cũng như những đứa trẻ nhiễu văn hóa khác, cảm thấy khó trả lời nhất là ', 46, 1),
(21, '11', 'Điềm lành - Những lời tiên tri tuyệt đích và chuẩn xác của phù thủy Agnes Nutter', 'sach8.jpg', 8, '2023-03-17 04:54:29', 176000, 'Quỷ Crowley và thiên thần Aziraphale biết rằng Tận Thế sắp sửa đến với thế giới này, với sự giáng lâm của Kẻ Chống Chúa trong hình hài đứa trẻ sơ sinh. Đáng lẽ cả hai phải lấy làm sung suớng: cuộc chiến tối hậu giữa thiên đường và địa ngục, dù phe nào thắng, thì cũng sẽ hủy diệt thế giới này, kết thúc cuộc giằng co hàng thiên niên kỷ giữa Thiện và Ác. Nhưng khốn nỗi, cả Crowley và Aziraphale lại thấy nuối tiếc thế giới của nhân loại. Thế giới con người vừa nhếch nhác, ngu xuẩn, lại vừa độc địa, thế nhưng nó cũng thú vị ghê gớm, đến nổi viễn cảnh phải sống ở một nơi toàn địa ngục hay toàn thiên đường trở nên không thể chịu đựng nổi với cả hai. Thiên thần và ác quỷ cùng tham gia vào một mưu đồ vừa khôn ngoan, vừa dớ dẩn, để cứu thế giới khỏi họa diệt vong.', 16, 3),
(22, '11', 'Một thoáng ta rực rỡ ở nhân gian ( Bìa cứng)', 'sach9.jpg', 8, '2023-03-17 03:34:47', 165700, 'Vuong thực sự có thiên tài quan sát.” The New York Times  “Với một xuất thân bên rìa hết sức xa lạ, Vuong đã viết nên một tác phẩm trữ tình về quá trình tự khám phá chính mình, vừa thành thật đến choáng váng, vừa phổ quát trong từng câu chữ.” The Washington Post  “Bằng sự chính xác của một nhà thơ, Ocean Vuong xem xét liệu biến kinh nghiệm của chúng ta thành từ ngữ có thể chữa lành những vết thương trải hàng thế hệ hay không, và liệu tiếng nói của ta có thể nào thực sự được nghe bởi những người ta yêu thương nhất.” Celeste Ng  Một thoáng ta rực rỡ ở nhân gian viết dưới dạng một lá thư của nhân vật chính, Chó Con, gửi cho người mẹ không biết chữ của mình. Dưới dạng những mẩu chuyện nhỏ, xen kẽ với những đoạn trữ tình ngoại đề, triết lý, và những bài thơ, cuốn sách kể câu chuyện đời không chỉ của Chó Con (tên gọi yêu do bà ngoại đặt cho, nhưng cũng là cách tất cả mọi người trong sách gọi cậu) từ thuở nhỏ đến lúc chớm trưởng thành, mà cả ba thế hệ từ bà, đến mẹ, đến cậu, một cuộc di cư dài từ làng quê Việt Nam sang đất Mỹ, cũng như câu chuyện của những thanh niên Mỹ thế hệ cậu mà đặc trưng là người bạn trai Trevor.  Cuốn sách thường được đọc như một Bildungsroman (tiểu thuyết trưởng thành), nhưng cũng có nhiều người coi đây là một Künstlerroman (tiểu thuyết kể về quá trình một người nghệ sĩ trở thành nghệ sĩ).', 0, 3),
(23, '12', 'Hỏi đáp cùng em! - Làm thế nào để bảo vệ thiên nhiên?', 'sach10.jpg', 9, '2023-03-17 03:34:49', 183000, 'Một cuốn sách giải đáp hơn 200 câu hỏi về những nguồn tài nguyên đáng kinh ngạc của hành tinh chúng ta cùng những hành động tuy nhỏ nhưng có ích để bảo vệ chúng.     Bốn chủ đề tách biệt được tô màu nổi bật:  Hành tinh của chúng ta Hệ động vật Hệ thực vật Bảo vệ thiên nhiên Những câu hỏi về thế giới quanh ta  Những đáp án giản dị  Ngoài ra còn có: Nhiều hình minh họa đẹp', 9, 3),
(24, '12', 'Ngày xưa của con', 'sach11.jpg', 10, '2023-03-17 03:34:57', 54000, '“...Ngày xưa của con giống như một cuốn nhật kí bằng thơ; ghi chép vội vã những câu nói ngây thơ của con , trong nhà, dọc đường đi, những cuộc đối thoại của mẹ- con bên vai nhau, kề má nhau, rủ rỉ suốt ngày không chán và mãi vẫn ngạc nhiên. Đôi từ còn chưa chau truốt nhưng trong sáng ngây thơ như rót mật vào tim. Bất cứ bộ đôi mẹ - con nào cũng có thể cùng nhau đọc lên những bài thơ đó như chuyện tình yêu của mình. Những hình ảnh rung động tận trái tim: “Mẹ nâng thật khẽ Bàn tay trắng xinh Đặt trong tay mình Như bông hoa nhỏ”', 8, 3),
(26, '10', 'Bài thơ của một người yêu nước mình', 'sach13.jpg', 10, '2023-03-17 03:35:03', 104000, '\"Thơ của Trần Vàng Sao chính là cuộc đời ông. [...] Thơ ông hiện ra như chính áo quần ông, tóc tai ông, hơi thở ông, ánh mắt ông, giọng nói ông, cảm giác ông, mồ hôi ông, đau đớn ông, giận dữ ông, giày vò ông, tuyệt vọng ông, khát vọng ông... và nhịp đập trái tim ông là thứ kỳ diệu nhất gắn kết toàn bộ những gì thuộc về ông để vang lên thành thi ca. Bởi thế, thơ ông chân thực và mãnh liệt như máu chảy trong huyết quản ông.  [...] Trần Vàng Sao là một thi sĩ chân chính đến trầm luân, Trần Vàng Sao là một người yêu nước đến đau đớn.\"  - Nguyễn Quang Thiều - Phó chủ tịch Hội Nhà văn Việt Nam Giám đốc, Tổng biên tập Nhà xuất bản Hội Nhà văn', 15, 2),
(27, '10', 'Chùa Đàn', 'sach14.jpg', 16, '2023-03-17 03:35:06', 48000, '“Sau một cái tử biệt, giờ ta phải tính đến một nỗi sinh li khác. Đối với đàn, hát, từ bây giờ ta nguyện làm một người điếc một người cô đơn một người phản bội. Và trên vong linh Bá Nhỡ, ta thề độc là không bao giờ cầm đến một cái chén nào của cuộc đời này.”', 0, 3),
(28, '10', 'Việt Nam danh tác - Vang bóng một thời', 'sach15.jpg', 13, '2023-03-17 03:35:17', 60800, '“Chùa nhà ta có cái giếng này quý lắm. Nước rất ngọt. Có lẽ tôi nghiện trà tàu vì nước giếng chùa nhà đây. Tôi sở dĩ  không đi đâu xa được là vì không đem theo được nước giếng này đi để pha trà. Bạch sư cụ, sư cụ nhớ hộ tôi câu   thế này: Là giếng chùa nhà mà cạn thì tôi sẽ cho không người nào muốn xin bộ đồ trà rất quý của tôi. Chỉ có nước   giếng  đây là pha trà không bao giờ lạc mất hương vị...”', 0, 3),
(29, '12', 'Kẻ dị biệt tại trường học phép thuật 5', 'sach16.jpg', 11, '2023-03-17 09:01:41', 108000, 'Kẻ dị biệt, tập đặc biệt, bao gồm những mẩu truyện ngắn chưa từng đăng tải trên mạng, hé lộ những sự kiện bất ngờ trong cuộc sống của các học sinh trường phép thuật.', 116, 1),
(30, '12', 'Pikalong – LONG YÊU VIỆT NAM', 'sach17.jpg', 12, '2023-03-17 04:38:31', 60000, 'GIỚI THIỆU SÁCH  Pikalong - Long Yêu Việt Nam Bùi Đình Thăng (bút danh Thăng Fly) là tác giả của nhiều bộ truyện tranh ý nghĩa như Ba tôi, Thư gửi nỗi buồn, Bão lũ miền Trung, Tôn vinh ẩm thực Việt… Chàng trai sinh năm 1988 nhanh chóng được cộng đồng mạng yêu thích không chỉ bởi nét vẽ phóng khoáng, sinh động mà mỗi tác phẩm của anh còn bao hàm ý tứ thâm trầm, sâu sắc.', 40, 2),
(31, '10', 'Tắt đèn', 'sach18.jpg', 16, '2023-03-17 03:35:33', 48000, '“Đánh ‘xoảng’ một cái, cái bát ở mâm lý cựu bay thẳng sang mâm lý đương. Và đánh ‘chát’ một cái, cái chậu ở chiếu lý đương cũng đập luôn vào cây cột bên cạnh lý cựu. Nước canh, nước mắm bắn ra tứ tung. Hết thảy mọi người đều lố nhố đứng dậy…  Chánh tổng sực tan giấc mộng, ngơ ngác hỏi giật hỏi giọng:  - Cái gì thế? Cái gì thế? Nốc cho lắm rồi nói bậy! Người nào gây chuyện với người nào?”', 160, 3),
(32, '10', 'Những ngã tư và những cột đèn ', 'sach19.jpg', 14, '2023-03-17 14:05:17', 64000, 'Tôi qua ngã tư Cửa Nam. Ngã tư Cửa Nam đầy khói. Để không thể đếm bao nhiêu nốt chân trên ngã tư. Ai đếm bao nhiêu nốt chân khôn dại. Bao nhiêu nốt chân vui buồn? Ai đếm những ngã tư đời láo nháo nốt chân. Láo nháo cột đèn láo nháo đèn? Đời tôi đã rẽ rồi. Như đã hạ nước cờ không sao đi lại được. Nhưng tại sao tôi cứ ám ảnh: cái ngã tư tại sao ấy. Tôi quên không được. Đi đi không được. Tôi ngồi bệt lề đường. Tôi là đàn ông: tôi không đau khổ. Nhưng tôi muốn khóc. Tôi là đàn ông: Tôi không khóc. Nhưng tôi đau khổ lắm. Tôi ngồi bệt mà nhìn láo nháo cột đèn. Láo nháo khói. Láo nháo hàng cây bên đường lá rụng. Tôi nghe gà gáy te te nội thành. Chỗ tôi ngồi không xa có vườn hoa Canh Nông. Tôi lảo đảo dậy: tôi đi tìm vườn hoa Canh Nông. Tôi vào vườn hoa. Tôi ngồi ghế đá. Ghế đá lạnh. Gà gáy te te. Phố bắt đầu mất khói. Vườn hoa cũng bắt đầu hết khói. Là rạng đông rồi. Tôi không mệt. Buồn ngủ cũng không. Tôi đã nói rồi: tôi đi thấu sáng. Bây giờ tôi ngồi. Cùng với rạng đông. Trong một vườn hoa.', 25, 1),
(33, '12', 'Khó Khăn Như Con Mèo', 'sach20.jpg', 15, '2023-03-17 08:35:21', 55200, 'Cuộc sống của một họa sĩ biếm họa nổi tiếng thế giới không dễ dàng tẹo nào. Những deadline dày đặc, hàng đống giấy gói đồ ăn nhanh lăn lóc dưới màn hình máy tính sáng xanh, và đàn thú nuôi gia tăng đến chóng mặt… ừmm, à không, thực ra vẫn từng ấy con mà thôi.     “Mặn” hơn muối và đầy duyên dáng, tuyển tập thứ ba của Sarah Andersen, gồm truyện tranh và các chia sẻ riêng của cô cùng kèm tranh minh họa, là một cuốn cẩm nang chứa bí kíp sinh tồn trong cuộc sống hiện đại đảo điên: từ tầm quan trọng của việc tránh mặt những người thuộc tuýp dậy sớm, 101 cách đối phó với thị phi trên mạng xã hội, tới sự bất lực khi thay đổi thói quen dọn dẹp. Nhưng khi tất cả mọi sự đều thất bại và thế giới quanh bạn đang sụp đổ, hãy pha một cốc sô-cô-la nóng, đếm ngược tới ngày Halloween, và cuộn tròn bên tụi thú cưng lông xù để thấy đời tươi sáng hơn.', 79, 1),
(34, '12', 'Bà Ngoại Thời @', 'sach21.jpg', 22, '2023-03-17 03:35:54', 52800, 'Không ti vi, không máy tính, không điện thoại di động. Đó là giải pháp của bố mẹ để đối phó với 1 kẻ nghiện đủ các thể lại màn hình như Sam, khi quyết định gửi nó về sống ở nhà bà ngoại tại Nice. Địa ngục là đây chứ còn đâu nữa! Nhưng địa ngục ấy không chỉ dành cho Sam, bởi bà ngoại Martha từ giờ trở đi sẽ phải sống với cuộc sống độc thân yêu thích của mình, lại suốt ngày vất vả nấu nướng, chăm sóc và kèm cặp thằng cháu ngoại 16 tuổi lộc ngộc đang độ ương bướng. Nhưng có ai học được chữ ngờ. Biết đâu chừng cuộc sống chung cưỡng ép ấy lại là cơ hội cho cả hai bà cháu  để thay đổi những thói quen của mình và nhìn thế giới dưới một góc độ khác? Nhất là khi, bà ngoại bỗng chốc  biến thành một con người không ai hình dung nổi.', 23, 3),
(35, '11', 'Hoa vẫn nở mỗi ngày', 'sach22.jpg', 18, '2023-03-17 03:40:50', 187000, 'GIỚI THIỆU SÁCH: Violette Toussaint sống mà như chết. Người phụ nữ ấy bị mẹ đẻ bỏ rơi ngay khi vừa lọt lòng, tới lượt cô con gái nhỏ mà cô yêu thương nhất lại bỏ cô mà đi trong một tai nạn thảm khốc, rồi cả đến người chồng một ngày kia cũng không còn ở lại bên cô. Cuộc đời của một nhân viên gác chắn nơi ga xép với những chuyến tàu nhỏ mỗi ngày đến rồi đi hay của một người quản trang tại nghĩa trang tỉnh lẻ chuyên đón nhận người chết và chăm sóc các phần mộ tưởng chừng chỉ gắn chặt với mất mát, buồn đau, rồi úa tàn dần theo năm tháng. Nhưng sự sống là mầu nhiệm, hy vọng vẫn còn đó, hạnh phúc lại có dịp được hồi sinh khi hoa kia được thay nước, khi chính con người vẫn tin vào cuộc đời.  Một câu chuyện sẽ ở lại lâu trong lòng độc giả. Nhẹ nhàng mà thấm thía. Bởi dẫu có lẽ không ít lần lấy đi nước mắt của người đọc, câu chuyện về tình yêu, tổn thương và hy vọng này cuối cùng sẽ để lại trong ta những cảm xúc tích cực, hạnh phúc cùng niềm mãn nguyện êm đềm một khi đã lật giở đến những trang cuối.', 70, 3),
(36, '11', 'Câu chuyện cuối cùng', 'sach23.jpg', 19, '2023-03-17 14:05:02', 100000, 'Giới thiệu sách Vướng bẫy thông tin, Kitty Logan bế tắc như rơi xuống vực sâu. Cô đã làm chương trình truyền hình vu oan cho một người vô tội. Danh tiếng nghề nghiệp hoen ố, cô phải ra tòa, bị truyền thông xâu xé, bạn trai từ bỏ. Đúng lúc ấy, Constance Duboys, nữ tổng biên tập tài năng của tạp chí Etcetera, bạn gái thân thiết, người đỡ đầu thương yêu của cô mắc ung thư rồi ra đi không kịp nói hết câu chuyện dang dở… Kitty không biết sẽ phải làm gì để đứng lên, khi cơ hội Constance trao lại cô chỉ là bản danh sách 100 bí ẩn. Cuối cùng, thay vì loay hoay bên ngoài, Kitty trở lại, bắt đầu từ chính nội tâm mình, để tìm chìa khóa đi vào bí mật.  Nhưng 100 cái tên, là 100 cuộc đời người. Liệu trong hai tuần lễ ngắn ngủi đầy sức ép, và thậm chí ám hại, Kitty có thể khám phá và kể hết chăng tất cả, để hoàn thành thiên phóng sự cho số tưởng niệm Constance Duboys?     Một cách thông minh và kịch tính, Cecelia Ahern đã dồn nén câu chuyện có thể là bất tận ấy trên các trang sách hữu hạn, và rồi khi đi vào tâm trí độc giả, nó sẽ bung ra theo chiều kích tự do của tưởng tượng về muôn số phận con người… ', 140, 2),
(37, '20', 'Đại Nam dật sự và Sử ta so với sử Tàu', 'sach24.jpg', 12, '2023-03-17 08:42:56', 108000, 'Đại Nam dật sự và Sử ta so với sử Tàu là tập hợp hai chuyên luận sử học tiêu biểu của học giả Nguyễn Văn Tố. Với hai công trình này, không quá lời để nói Nguyễn Văn Tố là nhà sử học đầu tiên đặt nền móng cho bộ môn sử liệu học ở Việt Nam thời hiện đại.     Trong suốt hai năm từ 1943 đến 1945, liên tục và đều đặn trên gần 100 số báo Tri Tân và Thanh Nghị, Nguyễn Văn Tố đã phác thảo một lịch sử Việt Nam trải dài từ một nghìn năm Bắc thuộc cho đến thời kỳ đầu độc lập dưới các triều Ngô, Đinh, Tiền Lê, Lý. Trong bối cảnh nguồn sử liệu Hán văn hầu như chưa có bản dịch, tác giả đã làm công việc phiên dịch, đồng thời đối chiếu, phê phán sử liệu một cách tường tận nhằm soi tỏ hàng trăm nhân vật, sự kiện và danh xưng: thời Bắc thuộc đã có những người Nam nào làm quan bên Tàu và những người Tàu nào sang nước ta cai trị, những cuộc khởi nghĩa chống giặc phương Bắc đã tiến hành ra sao, mười hai sứ quân gồm những sứ quân nào, nước ta từng có những tên gọi gì... Những vấn đề tưởng chừng quen thuộc song vẫn hiện lên hết sức sinh động nhờ lối viết vừa khảo vừa kể, chặt chẽ mà hấp dẫn. Đó là biệt tài, cũng là đóng góp tiên phong trong việc tái hiện lịch sử Việt Nam từ các nguồn sử liệu chữ Hán của Ứng Hòe Nguyễn Văn Tố.', 12, 3),
(38, '12', 'Việt Nam Sử Lược', 'sach25.jpg', 22, '2023-03-17 04:31:00', 103000, 'Cái nghĩa vụ làm sử, tưởng nên kê cứu cho tường tận, rồi cứ sự thực mà nổi, chứ không nên lấy lòng yêu ghét của mình mà xét đoán. Dẫu người mình ghét mà có làm điều phải, mình cũng phải khen; người mình yêu mà có làm điều trái, mình cũng phải chê', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `cartID` int(11) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `clientID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`cartID`, `bookName`, `clientID`, `bookID`, `image`, `price`, `quantity`) VALUES
(4, 'Metropolis (Lịch sử phát triển đô thị, phát minh lớn nhất của loài người)', 14, 16, 'sach4.jpg', 320000, 2),
(12, 'Len Chùi - Silo Tháp Giống', 19, 8, 'sach1.jpg', 214000, 3),
(17, 'Metropolis (Lịch sử phát triển đô thị, phát minh lớn nhất của loài người)', 19, 16, 'sach4.jpg', 320000, 2),
(18, 'Câu chuyện cuối cùng', 19, 36, 'sach23.jpg', 100000, 1),
(19, 'Những ngã tư và những cột đèn ', 19, 32, 'sach19.jpg', 64000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cateName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `cateName`) VALUES
(1, 'Tiểu Thuyết'),
(10, 'Văn Học Việt Nam'),
(11, 'Văn Học Nước Ngoài'),
(12, 'Thiếu Nhi'),
(13, 'Truyện'),
(15, 'Tâm Lý'),
(16, 'Kinh Tế - Kinh Doanh'),
(17, 'Tình Cảm'),
(18, 'Truyền Cảm Hứng - Self Help'),
(20, 'Lịch Sử');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `clients`
--

CREATE TABLE `clients` (
  `clientID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `accountName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT 'avatarUser.jpg',
  `role` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `clients`
--

INSERT INTO `clients` (`clientID`, `username`, `accountName`, `email`, `password`, `address`, `phoneNumber`, `avatar`, `role`) VALUES
(8, 'Admin', '', 'phibnph29465@fpt.edu.vn', '$2y$10$HE0we7vFO8SUIsCeZJQAGO9y/x5aXj9r8cnXhEmiPdeC/w/rgvTs2', 'Ninh Bình', '0376212240', 'avatarUser.jpg', 1),
(14, 'phidieu', '', 'phidieu@gmail.com', '$2y$10$cYCJ3epshdqH3EW1F.a5Je.UwqCTZxierAE2iLp3xw6gVVmGjj9mS', 'Kim Sơn', '0376212240', 'avatarUser.jpg', 0),
(18, 'Phi', 'buingocphi', 'buingocphinn@gmail.com', '$2y$10$sgQPt3m1hXs/auoUlu/f9.qd53XkcvhqEhOe8MvS8e5T24gdItEEq', 'Hà Nội', '120222001', 'avatarUser.jpg', 0),
(19, 'Test', 'test', 'test@gmail.com', '$2y$10$/Fcxl.W/Up12wmKj6ZW6a.awY/eSroCZzpfNKeuDKw9IxugU9ha8q', 'Kim Sơn', '0376212240', 'avatarUser.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feeback`
--

CREATE TABLE `feeback` (
  `id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `bookID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `dateBuy` timestamp NOT NULL DEFAULT current_timestamp(),
  `statusOrder` int(11) NOT NULL DEFAULT 0,
  `clientName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `statusName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`id`, `statusName`) VALUES
(1, 'Mới Tái Bản'),
(2, 'Bán Chạy Nhất'),
(3, 'Default');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorID`) USING BTREE;

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cartID`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientID`);

--
-- Chỉ mục cho bảng `feeback`
--
ALTER TABLE `feeback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `authors`
--
ALTER TABLE `authors`
  MODIFY `authorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `clients`
--
ALTER TABLE `clients`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `feeback`
--
ALTER TABLE `feeback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

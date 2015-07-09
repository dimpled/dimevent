<?php
use yii\widgets\ListView;
use yii\bootstrap\ButtonGroup;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use common\lib\sdii\widgets\SDGridView;
use common\lib\sdii\widgets\SDModalForm;
use common\lib\sdii\components\helpers\SDNoty;
/* @var $this yii\web\View */
$this->title = 'งานประชุมวิชาการ โรงพยาบาลขอนแก่น';
?>
    <header>
        <div class="header-content">

            <div class="header-content-inner">
                <br> <br>
                <div class="row">
                  <div class="col-md-6 col-xs-6 text-right"><img style="width:190px;" class="img-rounded" src="img/kkh.png" ></div>
                  <div class="col-md-6 col-xs-6 text-left"><img style="width:220px;" class="img-rounded" src="img/kkmec.png" ></div>
                </div>
                <h1>คุณธรรม คู่คุณภาพ เพื่อประชาชน</h1>
                <hr>
                <p style="margin-bottom:0;">งานประชุมวิชาการ  ครั้งที่ 7 ประจำปี 2558</p>
                <p style="margin-bottom:10px;">เนื่องในโอกาสครบรอบ 20 ปี ศูนย์แพทยศาสตรศึกษาชั้นคลินิก โรงพยาบาลขอนแก่น</p>
                <p style="margin-bottom:10px;"><strong >24 -  26</strong>   มิถุนายน 2558 ณ โรงพยาบาลขอนแก่น</p>
                <?php  Html::a(Yii::t('app', '<span class="glyphicon glyphicon-plus"></span> ลงทะเบียน'),'#registration', ['data-url'=>Url::to(['registration/create']), 'class' => 'btn btn-primary btn-xl', 'id'=>'modal-addbtn-registration'])?>
                 <!-- <a href="#about" class="btn btn-primary btn-xl page-scroll"> <span class="glyphicon glyphicon-edit"></span> ส่งผลงาน</a> -->
            </div>
        </div>
    </header>

    <section class="bg-primary" id="schedule">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">

                    <h2 class="section-heading">กำหนดการ</h2>
                    <hr class="light">
                    <p class="text-faded">
                    โรงพยาบาลขอนแก่น ขอเชิญบุคลากรด้านสาธารณสุข ส่งผลงานวิชาการเพื่อเข้ารับการคัดเลือกให้นำเสนอและประกวด ในการประชุมวิชาการโรงพยาบาลขอนแก่น ครั้งที่ 7 ประจำปี 2558 ในวันที่  24-26 มิถุนายน 2558 โดยมี Theme ในการประชุมครั้งนี้คือ "คุณธรรม คู่คุณภาพ เพื่อประชาชน " 

                    </p>
                    <p>ส่งผลงานเข้าร่วมประกวด ได้ตั้งแต่บัดนี้ จนถึงวันที่ 10 มิถุนายน 2558</p>
                    <!-- <a href="#" class="btn btn-default btn-xl">รายละเอียด</a> -->
        
                     <!-- <a href="#" class="btn btn-default btn-xl">ลงทะเบียนส่งผลงาน</a> -->
                </div>
            </div>
        </div>
    </section>



<section id="services">
  <div class="container">

   <div class="row">
        <div class="col-lg-8 col-lg-offset-2 text-center">

        <div class="row">
              <div class="col-lg-12 text-center">
                  <h2 class="section-heading">การประกาศผลการคัดเลือกผลงาน</h2>
                 
                  <hr class="primary">
              </div>
        </div>
        <p>
         <a class="btn btn-primary btn-lg" href="<?= Url::to('/downloads/18658.zip');?>">ดาวน์โหลด </a>
        <h4>ประเภท e-Poster</h4>
        การเตรียมความพร้อมในการนำเสนอประเภท e-Poster ให้ผู้นำเสนอทำโปสเตอร์ หรือ graphic design

เป็น PDF file โดยทำเป็นขนาด A4 แล้ว save เป็นภาพ jpeg เพื่อนำเสนอผ่าน Projector 

โดยจัดส่งไฟล์ที่จะนำเสนอ ล่วงหน้าภายในวันที่ 23 มิถุนายน 2558 เวลา 08.30 - 16.00น.  ที่ศูนย์วิจัย                               

email: library.kkh@gmail.com เวลาที่ใช้ในการนำเสนอ 5 นาที กรรมการซักถาม 2 นาที รวมเป็น 7 นาที

(หมายเหตุ:  คณะกรรมการจะจัดให้มีการซักซ้อมทำความเข้าใจวิธีการนำเสนอก่อน ในวันที่ 19 มิถุนายน 2558 

เวลา 13.30–14.30น. ณ ห้องสมุด ชั้น 1 อาคารเฉลิมพระเกียรติ 6 รอบพระชนมพรรษา โรงพยาบาลขอนแก่น)
        </p>
       
        </div>
      </div>
      
  </div>
</section>


<section id="services">
<div class="container">

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 text-center">

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">ตารางการประชุม</h2>
                        <p>24 -  26 มิถุนายน 2558 ณ โรงพยาบาลขอนแก่น</p>
                        <hr class="primary">
                    </div>
                </div>

          <img src="img/poster.png" class="img-responsive img-thumbnail" >
          <img src="img/schedule.png" class="img-responsive img-thumbnail" >
          </div>
    </div>

<!--           <table style="margin-top:20px;" class="table table-striped">
          <thead>
           <tr class="bg-schedule">
              <th colspan="2" class="text-primary " >วันพุธที่ 24 มิถุนายน 2558</th>
              
            </tr>
         
          </thead>
          <tbody>
            <tr>
              <th scope="row" style="width:150px;">08:30 - 09:00 น.</th>
              <td class="text-left">ลงทะเบียน</td>
              
            </tr>
            <tr>
              <th scope="row">09:00 - 09:30 น.</th>
              <td class="text-left"><strong class="text-info">พิธีเปิด</strong> โดย นพ.รัฐวุฒิ สุขมี ผู้ตรวจราชการกระทรวงสาธารณะสุข เขตสุขภาพที่ 7</td>
            </tr>
            <tr>
              <th scope="row">09:30 - 12:00 น.</th>
              <td class="text-left">ปาฐกถาพิเศษ เรื่อง <strong class="text-info"><i>"โรงพยาบาลคุณธรรม"</i></strong> โดย ฯพณฯ ม.ล.ปนัดดา ดิศกุล  รัฐมนตรีประจำสำนักนายกรัฐมนตรี และปลัดสำนักนายกรัฐมนตรี</td>
             
            </tr>
            <tr class="warning">
              <th scope="row">12:00 - 13:00 น.</th>
              <td class="text-left text-warning">รับประทานอาหารกลางวัน</td>
             
            </tr>
            <tr>
              <th scope="row">13:00 - 14:30 น.</th>
              <td class="text-left">
              <strong class="text-info">Research Show</strong><br>
              <ul>
                <li><i>R2R</i>  คุณวราภรณ์ ประทุมนันท์ งานควบคุมและป้องกันโรคติดเชื้อ โรงพยาบาลขอนแก่น  <br></li>
                <li><i>Systematic Review และ Meta-analysis</i> นศพ. เรวดี  วงศ์อามาตย์  นักศึกษาแพทย์ชั้นปีที่ 6 ศูนย์แพทยศาสตรศึกษาชั้นคลินิก โรงพยาบาลขอนแก่น<br></li>
                <li><i>งานวิจัยจาก รพ.สต. โดยคุณอ้อมฤทัย มั่นในบุญธรรม นักวิชาการสาธารณสุขชำนาญการ จากศูนย์สุขภาพชุมชนบ้านหนองกุง</i> </li>
              </ul>
               ดำเนินรายการโดย ดร.นพ.ธนชัย พนาพุฒิ ผู้อำนวยการศูนย์วิจัย โรงพยาบาลขอนแก่น<br>
              <strong class="text-info">ประกวด Oral, e-Poster, Poster, Innovation</strong>
              </td>
            </tr>
            <tr>
              <th scope="row">14:30 - 16:00 น.</th>
              <td class="text-left"> <strong class="text-info">โค้ชเชิงบวก (Appreciative Inquiry Coaching) </strong>โดย ดร.ภิญโญ รัตนาพันธุ์ วิทยาลัยบัณฑิตศึกษาการจัดการ (MBA) มหาวิทยาลัยขอนแก่น</td>
              
            </tr>
          </tbody>
        </table>
         <table class="table table-striped">
          <thead>
           <tr class="bg-schedule">
              <th colspan="2" class="text-primary">วันพุธที่ 25 มิถุนายน 2558</th>
              
            </tr>
            
          </thead>
          <tbody>
            <tr>
              <th scope="row" style="width:150px;">09:00 - 09:30 น.</th>
              <td class="text-left" ><strong class="text-info">2 ทศวรรษแห่งการผลิตแพทย์เพื่อประชาชน (Multimedia)</strong> และการแสดงของนักศึกษาแพทย์

ศูนย์แพทยศาสตรศึกษาชั้นคลินิก โรงพยาบาลขอนแก่น และคณะแพทยศาสตร์ มหาวิทยาลัยขอนแก่น</td>
              
            </tr>
            <tr>
              <th scope="row">09:30 - 10:00 น.</th>
              <td class="text-left" >มอบรางวัลศิษย์เก่าดีเด่น ของโรงพยาบาลขอนแก่น</td>
             
            </tr>
            <tr>
              <th scope="row">10:00 - 12:00 น.</th>
              <td class="text-left"><strong class="text-info">หยั่งรากวิญญาณมนุษย์ ผลิใบวิญญาณแพทย์</strong>

โดย ดร.นพ.สกล สิงหะ คณะแพทยศาสตร์ มหาวิทยาลัยสงขลานครินทร์</td>
             
            </tr>
            <tr class="warning">
              <th scope="row">12:00 - 13:00 น.</th>
             <td class="text-left text-warning">รับประทานอาหารกลางวัน</td>
             
            </tr>
            <tr>
              <th scope="row">13:00 - 16:00 น.</th>
              <td class="text-left"><strong class="text-info">Panel A Workshop : เรียนรู้ตนเอง สร้างสรรค์สังคม</strong>

                <br>โดย พญ.วนาพร วัฒนกูล กลุ่มงานเวชกรรมสังคม โรงพยาบาลขอนแก่น<br>

                 นพ.สตางค์ ศุภผล กลุ่มงานเวชกรรมสังคม โรงพยาบาลขอนแก่น<br>

                 ดร.พญ.ศิรินาถ ตงศิริ คณะแพทยศาสตร์ มหาวิทยาลัยมหาสารคาม<br>

                 ดร.ทพญ.สุวดี เอื้ออรัญโชติ คณะทันตแพทยศาสตร์ มหาวิทยาลัยขอนแก่น<br><br>

               <strong class="text-info">Panel B Workshop : ความฝัน ความหวัง พลังนักศึกษา เพื่อบ้านเกิด</strong><br>

                โดย พญ.สุกัญญา ศรีนิล กลุ่มงานสูตินรีเวชกรรม โรงพยาบาลขอนแก่น<br>

                 พญ.วัลลภา บุญพรหมมา กลุ่มงานจิตเวช โรงพยาบาลขอนแก่น<br>

                 นพ.วิชาญ คิดเห็น ผู้อํานวยการโรงพยาบาลวังน้ําเขียว<br>
              </td>
             
            </tr>
          </tbody>
        </table>
        <table class="table table-striped ">
          <thead>
            <tr class="bg-schedule">
              <th colspan="2" class="text-primary">วันพุธที่ 26 มิถุนายน 2558</th>
              
            </tr>
            
          </thead>
          <tbody>
            <tr>
              <th style="width:150px;" scope="row">09:00 - 12:00 น.</th>
              <td class="text-left"><strong class="text-info">การสร้างวัฒนธรรมองค์กร</strong>

โดย ศ.ดร.นพ.ประสิทธิ์ วัฒนาภา

คณบดีคณะแพทยศาสตร์ศิริราชพยาบาล มหาวิทยาลัยมหิดล</td>
              
            </tr>

           
            <tr class="warning">
              <th scope="row">12:00 - 13:00 น.</th>
             <td class="text-left text-warning">รับประทานอาหารกลางวัน</td>
             
            </tr>
            <tr>
              <th scope="row">13:00 - 15:00 น.</th>
              <td class="text-left"><strong class="text-info">สุขที่หาได้ ชีวิตติดดิน</strong>

นายโจน จันได</td>
             
            </tr>
            <tr>
              <th scope="row">15:00 - 15:30 น.</th>
              <td class="text-left"><strong class="text-info">ประกาศและมอบรางวัลผลงานวิชาการ และ พิธีปิด</strong></td>
              
            </tr>
          </tbody>
        </table>
        </div>
    </div>
</div>
</section>

    <section class="bg-primary" id="submission">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">ลงทะเบียนส่งผลงาน</h2>
                    <hr class="light">
                    
                    <p>ส่งผลงานเข้าร่วมประกวด ได้ตั้งแต่บัดนี้ จนถึงวันที่ 10 มิถุนายน 2558</p>
                                   </div>
            </div>
        </div>
    </section>
    <section id="services">
        <div class="container">




        <p>งานประชุมวิชาการโรงพยาบาลขอนแก่น ครั้งที่ 7 ประจำปี 2558 </p>
    
<p class="lead">โรงพยาบาลขอนแก่น ขอเชิญบุคลากรด้านสาธารณสุข ส่งผลงานวิชาการเพื่อเข้ารับการคัดเลือกให้นำเสนอและประกวด ในการประชุมวิชาการโรงพยาบาลขอนแก่น ครั้งที่ 7 ประจำปี 2558 ในวันที่ 24-26 มิถุนายน 2558 โดยมี Theme ในการประชุมครั้งนี้ คือ "คุณธรรม คู่คุณภาพ เพื่อประชาชน" ตามขั้นตอนในการส่งผลงานดังนี้

</p>

<ol>
<li>
ประกาศรับสมัครผลงาน เพื่อคัดเลือกเข้าประกวดผลงานวิชาการดีเด่น  
มีทั้งหมด 6 สาขา ได้แก่ 1.การแพทย์/เภสัชกรรม/ทันตกรรม 2.การพยาบาล 3.การส่งเสริมสุขภาพและอนามัยสิ่งแวดล้อม/Lab, วิทยาศาสตร์การแพทย์/กายภาพบำบัด 4.บริหารสาธารณสุข/นโยบายสาธารณสุข/เศรษฐศาสตร์/สาธารณสุขทั่วไป/การแพทย์แผนไทย 5.การป้องกันและควบคุมโรค และงานพัฒนาคุณภาพ
ส่งผลงานได้ที่ ศูนย์วิจัย e–mail :library.kkh@gmail.com กำหนดรับสมัครตั้งแต่บัดนี้ ถึงวันที่ 10 มิถุนายน 2558 
</li>
<li>
    ผลงานที่ส่งเข้าประกวด  แบ่งรูปแบบการนำเสนอเป็น 3 ประเภท
    <ol>
        <li>
        Oral นำเสนอด้วยเครื่อง e-Poster)
        </li>
        <li>
            Poster
        </li>
        <li>
            Innovation
        </li>
    </ol>
</li>
<li>
    แบบฟอร์มบทคัดย่อ (Abstract)
ส่งใบแจ้งความจำนงพร้อมบทคัดย่อผลงานที่มีความยาวไม่เกิน 2 หน้ากระดาษ A4 พิมพ์ด้วยโปรแกรม Microsoft Word 2003 หรือ 2007 หรือ XP  ตัวอักษร TH SarabunPSK ขนาดตัวอักษร 16 พอยท์  ตามรายละเอียดดังนี้ 
    <ul>
        <li>
            <i>ประเภทผลงานด้านงานวิจัย  ประกอบด้วย</i>
            <ol>
                <li>ชื่อเรื่อง</li>
                <li>รายชื่อผู้วิจัยหลัก หรือคณะทำงาน พร้อมชื่อหน่วยงาน และให้ขีดเส้นใต้ ผู้วิจัยที่นำเสนอผลงาน</li>
                <li>เนื้อหา
                    <ol>
                        <li>ที่มาและความสำคัญของปัญหา </li>
                        <li>วัตถุประสงค์ </li>
                        <li>วิธีการศึกษา </li>
                        <li>ผลการศึกษา </li>
                        <li>สรุปผลการศึกษา </li>
                    </ol>
                </li>
            </ol>
        </li>
        <li>
            <i>ประเภทผลงานด้านงานพัฒนาคุณภาพ  ประกอบด้วย</i>
            <ol>
                <li>ชื่อเรื่อง</li>
                <li>รายชื่อผู้วิจัยหลัก หรือคณะทำงาน พร้อมชื่อหน่วยงาน และให้ขีดเส้นใต้ ผู้วิจัยที่นำเสนอผลงาน</li>
                <li>เนื้อหา
                    <ol>
                        <li>ที่มาและความสำคัญของปัญหา</li>
                        <li>วัตถุประสงค์ </li>
                        <li>วิธีการศึกษา</li>
                        <li>สรุปผลการศึกษา </li>
                        <li>การนำผลงานวิจัยไปใช้ประโยชน์ในงานประจำ</li>
                        <li>บทเรียนที่ได้รับ</li>
                        <li>ปัจจัยแห่งความสำเร็จ</li>
                    </ol>
                </li>
            </ol>
        </li>
    </ul>
</li>
<li>
 การประกาศผลการคัดเลือกผลงาน
การประกาศผลการคัดเลือกผลงานวิชาการเพื่อเข้าประกวด ในวันที่ 15 มิถุนายน 2558 ทาง www.kkh.go.th
</li>
<li>
   การเตรียมตัวสำหรับผู้ที่ผ่านการคัดเลือกผลงานรอบแรก 
   <ol>
       <li>ประเภท Oral (ให้นำเสนอด้วยเครื่อง e-Poster)
        การเตรียมความพร้อมในการนำเสนอประเภท Oral (นำเสนอด้วย e-Poster) ผู้ที่นำเสนอผลงาน 
        เตรียมการนำเสนอโดยทำไฟล์โปสเตอร์ หรือ graphic design ที่มีคำบรรยายหรือตารางที่มีขนาดตัวอักษรอ่านได้ชัดเจน ประกอบกับการนำเสนอด้วยโปรแกรม Power Point 2003 - 2010 โดยจัดส่งไฟล์ที่จะนำเสนอล่วงหน้าภายในวันที่ 23 มิถุนายน 2558 ที่ศูนย์วิจัย email: library.kkh@gmail.com เวลาที่ใช้ในการนำเสนอ 3 นาที กรรมการซักถาม 2 นาที รวมเป็น 5 นาที
       </li>
       <li>ประเภท Poster 
      การเตรียมความพร้อมในการนำเสนอด้วยโปสเตอร์  ให้ผู้นำเสนอจัดทำโปสเตอร์ ขนาดกว้าง 65 ซม. สูง
120 ซม. โดยเริ่มนำโปสเตอร์ไปติดบอร์ดในพื้นที่ที่กำหนดได้ตั้งแต่วันที่ 23 มิถุนายน 2558 เวลา 15.30–18.00 น. และในวันที่ 24 มิถุนายน 2558  เวลา 07.30– 10.00 น. ณ ห้องประชุมประมุข จันทวิมล โรงพยาบาลขอนแก่น โดยผู้นำเสนอต้องอยู่ประจำที่บอร์ดเพื่อนำเสนอต่อกรรมการ เวลาในการนำเสนอ 5 นาที กรรมการซักถาม 2 นาที หากผู้นำเสนอไม่อยู่ประจำบอร์ดระหว่างกรรมการตรวจ จะถูกตัดสิทธิ์จากการประกวด </li>
       <li>
       <li>
         ประเภท Innovation                                                                     
       ผู้นำเสนอต้องนำนวัตกรรมหรือสิ่งประดิษฐ์ ไปจัดวางในบริเวณโต๊ะที่จัดให้  อาจร่วมกับการจัดทำ
โปสเตอร์ ขนาดกว้าง 65 ซม. สูง 120 ซม. โดยเริ่มนำผลงาน และโปสเตอร์ไปติดบอร์ดในพื้นที่ที่กำหนด ได้ตั้งแต่วันที่ 23 มิถุนายน 2558  เวลา 15.30 - 18.00 น. และในวันที่ 24 มิถุนายน 2558 เวลา 07.30– 10.00น. ณ ห้องประชุมประมุข จันทวิมล โรงพยาบาลขอนแก่น โดยผู้นำเสนอต้องอยู่ประจำที่บอร์ดเพื่อนำเสนอต่อกรรมการ เวลานำเสนอ 5 นาที กรรมการซักถาม 2 นาที รวมเป็น 5 นาที) หากผู้นำเสนอไม่อยู่ประจำตำแหน่งที่นำเสนอผลงานระหว่างกรรมการตรวจ จะถูกตัดสิทธิ์จากการประกวด 
       </li>
   </ol>
</li>
<li>
    การตัดสินการประกวด ใช้เกณฑ์ในการพิจารณาโดยคณะกรรมการพิจารณาผลงาน
ผลงานนำเสนอที่ได้รับรางวัลผลงานวิชาการดีเด่นประเภท Oral (e-Poster) Poster และ Innovation จะได้รับเกียรติบัตรและเงินรางวัล 
</li>
</ol>
<blockquote>
  <p>ส่งผลงานเข้าร่วมประกวด ได้ตั้งแต่บัดนี้ จนถึงวันที่ 10 มิถุนายน 2558</p>
</blockquote>

<p class="text-left">
    ที่ ศูนย์วิจัย โรงพยาบาลขอนแก่น  
</p> -->

    </section>

    <section class="no-padding" id="download">
        <div class="container-fluid">
          <!--   <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="img/portfolio/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div> -->
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>ดาวน์โหลดเอกสาร</h2>
                <a href="downloads/attach.zip" class="btn btn-default btn-xl wow tada">Download Now!</a>
      
      <br> <br>
      <table class="table">

      <tbody>
        <tr>
          <th scope="row">1</th>
          <td class="text-left">หนังสือโครงการประชุมวิชาการ</td>
         <td><?=Html::a('Download','/attach/web.pdf');?></td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td class="text-left">คำชี้แจงส่งผลงานประกวดงานประชุมวิชาการ รพ.ขอนแก่นปี 2558</td>
          <td><?=Html::a('Download','/attach/explanation.doc');?></td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td class="text-left">ใบแจ้งความจำนงส่งผลงานในงานประชุมวิชากรรรพ.ขอนแก่น2558</td>
          <td><?=Html::a('Download','/attach/submission.doc');?></td>
        </tr>
      </tbody>
    </table>
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">ติดต่อเรา</h2>
                    <hr class="primary">
                    <p>
                      ศูนย์วิจัย โรงพยาบาลขอนแก่น  
                   </p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>043-336789 ต่อ 1605</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:library.kkh@gmail.com">library.kkh@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <?php
    Modal::begin([
    'id'=>'modal-registration',
    'size'=> Modal::SIZE_LARGE,
    'header' => '<h2>Loading....</h2>',
    // 'footer'=>'ok',
    //'toggleButton' => ['label' => 'ลงทะเบียน','id'=>'btn-modal-registration','class'=>'btn btn-lg btn-warning','data-url'=>Url::to(['registration/create'])],
    ]);

Modal::end();


Modal::begin([
    'id'=>'modal-type',
    'header' => '<h3>ลงทะเบียนเข้าร่วมประชุม</h3>',
    //'toggleButton' => ['label' => 'click me'],
    'footer'=>'seminar.kkh.go.th'     
]);
?>

<div class="row">
    <div class="col-md-6">
        <botton id="btn-private" data-url="<?=Url::to(['registration/create','type'=>1]); ?>" data-url-login="<?=Url::to(['registration/login-popup']); ?>" class="btn btn-success btn-lg btn-block"> <i class="glyphicon glyphicon-user"></i> บุคลากร รพ.ขอนแก่น</botton><br>
    </div>
    <div class="col-md-6">
        <botton id="btn-public" data-url="<?=Url::to(['registration/create','type'=>2]); ?>" class="btn btn-primary btn-lg btn-block"> <i class="glyphicon glyphicon-user"></i>  บุคลากรภายนอก</botton>
    </div>
</div>

<?php Modal::end();?>

<?php Modal::begin([
    'id'=>'modal-login',   
]);
?>

<?php Modal::end();?>




<?php
$this->registerJs("

    var isLogin = ".(Yii::$app->user->isGuest?'false':'true').";
    var isPrivate;
    var urlLogin;
    var urlRegistration;

    // event on click registration button
    $('body').on('click', '#modal-addbtn-registration', function(){
        $('#modal-type').modal('show');
    });

    // event on click btn-private button in modal-type
    $('#modal-type').on('click', '#btn-private', function(e){
         isPrivate = true;
         $('#modal-type').modal('hide');
    });

    // event on click btn-public button in modal-type
    $('#modal-type').on('click', '#btn-public', function(e){
        isPrivate = false;
        $('#modal-type').modal('hide');
    });

    // event on modal-type is hide modal
    $('#modal-type').on('hidden.bs.modal', function (e) {
       
       console.log(e);

       urlLogin = $(this).find('#btn-private').attr('data-url-login');
       urlRegistration = $(this).find(isPrivate?'#btn-private':'#btn-public').attr('data-url');

      if(isPrivate===true){
        if(isLogin==true){
            modalRegistration(urlRegistration);
         }else{
            modalLogin(urlLogin);
         }
      }else if(isPrivate===false){
        modalRegistration(urlRegistration);
      }
      
    });

    // event on modal-login is hide modal
    $('#modal-login').on('hidden.bs.modal', function (e) {
        modalRegistration(urlRegistration);
    });
        
    function modalRegistration(url) {
        $('#modal-registration').modal('show')
        .find('.modal-content')
        .load(url);
    }

    function modalLogin(url) {
        $('#modal-login').modal('show')
        .find('.modal-content')
        .load(url);
    }

");?>




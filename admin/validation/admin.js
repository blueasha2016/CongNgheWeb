//function to handle login-form validation
function loginValidate(loginForm){

var validationVerified=true;
var errorMessage="";

if (loginForm.login.value=="")
{
errorMessage+="Bạn chưa điền Username!\n";
validationVerified=false;
}
if(loginForm.password.value=="")
{
errorMessage+="Bạn chưa điền Password!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

function updateValidate(updateForm) {
    var validationVerified=true;
var errorMessage="";

if (updateForm.opassword.value=="")
{
errorMessage+="Hãy cung cấp Mật khẩu hiện tại.\n";
validationVerified=false;
}
if (updateForm.npassword.value=="")
{
errorMessage+="Hãy nhập vào Mật khẩu mới.\n";
validationVerified=false;
}
if(updateForm.cpassword.value=="")
{
errorMessage+="hãy nhập vào Nhập lại mật khẩu.\n";
validationVerified=false;
}
if(updateForm.cpassword.value!=updateForm.npassword.value)
{
errorMessage+="Mật khẩu và Nhập lại mật khẩu không khớp!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

//validate staffForm
function staffValidate(staffForm) {
    var validationVerified=true;
var errorMessage="";

if (staffForm.fName.value=="")
{
errorMessage+="Hãy cung cấp họ của nhân viên.\n";
validationVerified=false;
}
if (staffForm.lName.value=="")
{
errorMessage+="Hãy cung cấp tên của nhân viên.\n";
validationVerified=false;
}
if (staffForm.sAddress.value=="")
{
errorMessage+="Hãy cung cấp địa chỉ của nhân viên.\n";
validationVerified=false;
}
if(staffForm.mobile.value=="")
{
errorMessage+="Hãy cung cấp số điện thoại của nhân viên.\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

//function to handle specialsForm validation
function specialsValidate(specialsForm){

var validationVerified=true;
var errorMessage="";

if (specialsForm.name.value=="")
{
errorMessage+="Bạn chưa điền tên!\n";
validationVerified=false;
}
if (specialsForm.description.value=="")
{
errorMessage+="Bạn chưa điền miêu tả!\n";
validationVerified=false;
}
if (specialsForm.price.value=="")
{
errorMessage+="Bạn chưa điền giá!\n";
validationVerified=false;
}
if(specialsForm.start_date.value=="")
{
errorMessage+="Bạn chưa điền ngày bắt đầu!\n";
validationVerified=false;
}
if(specialsForm.end_date.value=="")
{
errorMessage+="Bạn chưa điền ngày kết thúc!\n";
validationVerified=false;
}
if (specialsForm.photo.value=="")
{
errorMessage+="Bạn chưa chọn ảnh!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

//function to handle foodsForm validation
function foodsValidate(foodsForm){

var validationVerified=true;
var errorMessage="";

if(foodsForm.name.value=="")
{
errorMessage+="Bạn chưa điền tên thức ăn!\n";
validationVerified=false;
}
if(foodsForm.price.value=="")
{
errorMessage+="Bạn chưa điền giá thức ăn!\n";
validationVerified=false;
}
if(foodsForm.category.selectedIndex==0)
{
errorMessage+="Hãy lựa chọn thể loại thức ăn!\n";
validationVerified=false;
}
if(foodsForm.photo.value=="")
{
errorMessage+="Bạn chưa chọn hình ảnh!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

//function to handle categoriesForm validation
function categoriesValidate(categoriesForm){

var validationVerified=true;
var errorMessage="";

if (categoriesForm.name.value=="")
{
errorMessage+="Bạn chưa điền tên thể loại!\n";
validationVerified=false;
}
if (categoriesForm.category.selectedIndex==0)
{
errorMessage+="Hãy chọn một thể laoij để xóa.\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

//function to handle quantitiesForm validation
function quantitiesValidate(quantitiesForm){

var validationVerified=true;
var errorMessage="";

if (quantitiesForm.name.value=="")
{
errorMessage+="Bạn chưa điền giá trị!\n";
validationVerified=false;
}
if (quantitiesForm.quantity.selectedIndex==0)
{
errorMessage+="Hãy chọn một số lượng để xóa.\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

//function to handle currenciesForm validation
function currenciesValidate(currenciesForm){

var validationVerified=true;
var errorMessage="";

if (currenciesForm.name.value=="")
{
errorMessage+="Bạn chưa điền loại tiền tệ!\n";
validationVerified=false;
}
if (currenciesForm.currency.selectedIndex==0)
{
errorMessage+="Chưa có loại tiền tệ nào được chọn!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

//function to handle ratingForm validation
function ratingsValidate(ratingsForm){

var validationVerified=true;
var errorMessage="";

if (ratingsForm.name.value=="")
{
errorMessage+="Bạn chưa điền mức độ đánh giá!\n";
validationVerified=false;
}
if (ratingsForm.rating.selectedIndex==0)
{
errorMessage+="Bạn chưa chọn mức độ đánh giá!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

//function to handle timezonesForm validation
function timezonesValidate(timezonesForm){

var validationVerified=true;
var errorMessage="";

if (timezonesForm.name.value=="")
{
errorMessage+="Bạn chưa điền múi giờ!\n";
validationVerified=false;
}
if (timezonesForm.timezone.selectedIndex==0)
{
errorMessage+="Bạn chưa chọn múi giờ!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

//function to handle tablesForm validation
function tablesValidate(tablesForm){

var validationVerified=true;
var errorMessage="";

if (tablesForm.name.value=="")
{
errorMessage+="Bạn chưa điền tên bàn!\n";
validationVerified=false;
}
if (tablesForm.table.selectedIndex==0)
{
errorMessage+="Bạn chưa chọn bàn!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

//function to handle partyhallsForm validation
function partyhallsValidate(partyhallsForm){

var validationVerified=true;
var errorMessage="";

if (partyhallsForm.name.value=="")
{
errorMessage+="Bạn chưa điền tên hội trường!\n";
validationVerified=false;
}
if (partyhallsForm.partyhall.selectedIndex==0)
{
errorMessage+="Bạn chưa chọn hội trường!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

//function to handle questionsForm validation
function questionsValidate(questionsForm){

var validationVerified=true;
var errorMessage="";

if (questionsForm.name.value=="")
{
errorMessage+="Bạn chưa điền câu hỏi!\n";
validationVerified=false;
}
if (questionsForm.question.selectedIndex==0)
{
errorMessage+="Bạn chưa chọn câu hỏi!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

//function to handle foodStatusForm validation
function statusValidate(foodStatusForm){

var validationVerified=true;
var errorMessage="";

if (foodStatusForm.food.selectedIndex==0)
{
errorMessage+="Bạn chưa chọn thức ăn!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

//function to handle ordersAllocation form validation
function ordersAllocationValidate(allocationForm){

var validationVerified=true;
var errorMessage="";

if (allocationForm.orderid.selectedIndex==0)
{
errorMessage+="Bạn chưa chọn mã đơn hàng!\n";
validationVerified=false;
}
if(allocationForm.staffid.selectedIndex==0)
{
errorMessage+="Bạn chưa chọn mã nhân viên!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

//function to handle reservationsAllocation form validation
function reservationsAllocationValidate(allocationForm){

var validationVerified=true;
var errorMessage="";

if (allocationForm.reservationid.selectedIndex==0)
{
errorMessage+="Bạn chưa chọn mã đặt chỗ!\n";
validationVerified=false;
}
if(allocationForm.staffid.selectedIndex==0)
{
errorMessage+="Bạn chưa chọn mã nhân viên!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}

//function to handle message validation
function messageValidate(messageForm){

var validationVerified=true;
var errorMessage="";

if (messageForm.subject.value=="")
{
errorMessage+="Bạn chưa điền chủ đề!\n";
validationVerified=false;
}
if (messageForm.txtmessage.value=="")
{
errorMessage+="Bạn chưa điền nội dung!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
return validationVerified;
}
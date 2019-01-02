function kiemtradk()
      	{
          
    //  $.post("dangky.php", { 'tentk': tk.tentk.value , 'hotentk' : tk.hotentk.value })
    // .done(function(data) {
    //     tk.submit();
    // }); // gui du lieu qua post tu javascrlipt sang php

      		  thongbaoloi.innerHTML ="";
      		  thongbao.style.background = "#2196f399"
              thongbao.style.color= "white";
           var dem = 0;


      		if(!kiemtrataikhoan())
      		{
      			dem++;
      		}
      		if(!kiemtramatkhau())
      		{
      			dem++;
      		}
      		if(!kiemtrahoten())
      		{
      			dem++;
      		}
      		if(!kiemtrangaysinh())
      		{
      			dem++;
      		}
      		if(!kiemtraemail())
      		{
             dem++;
      		}
      		if(!kiemtrasodienthoai())
      		{
             dem++;
      		}
          if(!kiemtradiachi())
          {
            dem++;
          }


      		if(dem == 0)
      		{
    
                     alert(tk.tentk.value);
                     var form_data = new FormData();
                     form_data.append("tai_khoan",tk.tentk.value);
                     form_data.append("mat_khau",tk.mktk.value);
                     form_data.append("ho_ten",tk.hotentk.value);
                     form_data.append("nam_sinh",tk.ngaysinhtk.value);
                     form_data.append("email",tk.emailtk.value);
                     form_data.append("sdt",tk.sdttk.value);
                     form_data.append("dia_chi",tk.diachi.value);
                     


               $.ajax({
                        url: 'dangky.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#themndmoi').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            // $('#msg').html(response); // display error response from the PHP script
                        }
                    });

      		  
      		}
      		else
      		{
            
             yeucau.style.display = "block";

              document.getElementById("thongbao").style.display = "block";
               document.getElementById("thongbao").style.borderRadius = "5px";
             document.getElementById("thongbao").style.border = "thick solid lightblue";
            
      			 // yeucau.style.display = "none";
      			 // document.getElementById("thongbao").style.display = "none"
      		  //  document.getElementById("thongbao").style.border = "thick solid lightblue";

      		}


      	}




function kiemtrataikhoan(){
		if(tk.tentk.value =="" )
      		{
      		
      	       		thongbaoloi.style.display="block";
      	       thongbaoloi.innerHTML ="Vui lòng nhập tên tài khoản<br>";
                 return false;
      		}
      		else
      		{

                     return true;
                 	  // window.location="dangnhap.html";
      		}
}
 function kiemtramatkhau(){
		if(tk.mktk.value =="" )
      		{
      		
      	       		thongbaoloi.style.display="block";
      	          thongbaoloi.innerHTML  = ((thongbaoloi.innerHTML == "")? "<br>Vui lòng nhập mat khau<br>" :  thongbaoloi.innerHTML  +="<br>Vui lòng nhập mat khau<br>");
                 return false;
      		}
      		else
      		{

                     return true;
                 	  // window.location="dangnhap.html";
      		}
}
 function kiemtrahoten(){
		if(tk.hotentk.value =="" )
      		{
      		
      	       		thongbaoloi.style.display="block";
      	          thongbaoloi.innerHTML  = ((thongbaoloi.innerHTML == "")? "<br>Vui lòng nhập ho va ten<br>" :  thongbaoloi.innerHTML  +="<br>Vui lòng nhập ho ten <br>");
                 return false;
      		}
      		else
      		{

                     return true;
                 	  // window.location="dangnhap.html";
      		}
}   	
function kiemtrangaysinh(){
	var today= new Date();
	var inputdate = tk.ngaysinhtk.value;
	var carchuoi = inputdate.split('-');
	var nam = parseInt(carchuoi[0], 10);
	// var thang = parseInt(carchuoi[1], 10);
	// var ngay = parseInt(carchuoi[2], 10);
	// alert(ngay + " / " +  thang +"/" + nam);
	// 
     var kiemtranam = parseInt(today.getFullYear()) - nam;
	
	if(inputdate == "" )
    {
                
      	     thongbaoloi.style.display="block";
      	     thongbaoloi.innerHTML  = ((thongbaoloi.innerHTML == "")? "<br>Vui lòng nhập ngay sinh<br>" :  thongbaoloi.innerHTML  +="<br>Vui lòng nhập ngay sinh <br>");
              return false;
    
    }
    if( kiemtranam <= 18) 
    {
    	thongbaoloi.style.display="block";
      	thongbaoloi.innerHTML  = ((thongbaoloi.innerHTML == "")? "<br>Tu 18 tuoi tro len<br><br>" :  thongbaoloi.innerHTML  +="<br>Tu 18 tuoi tro len<br>");
        return false;
    }
    return true;
    
}

function kiemtraemail(){

	var message = document.getElementById("email");
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(tk.emailtk.value.match(mailformat))
	{
		return true;
		
	} else {
		      	     thongbaoloi.style.display="block";
      	     thongbaoloi.innerHTML  = ((thongbaoloi.innerHTML == "")? "<br>Email khong hop le<br>" :  thongbaoloi.innerHTML  +="<br>Email khong hop le<br>");
		return false;
	}
	
}
 function kiemtrasodienthoai(){
		if(tk.sdttk.value =="" )
      		{
      		
      	       	thongbaoloi.style.display="block";
      	        thongbaoloi.innerHTML  = ((thongbaoloi.innerHTML == "")? "<br>Vui lòng nhập so dien thoai<br>" :  thongbaoloi.innerHTML  +="<br>Vui lòng nhập so dien thoai <br>");
                return false;
      		}
      		else
      		{

                     return true;
                 	  // window.location="dangnhap.html";
      		}
}
function kiemtradiachi(){
    if(trimfield(tk.diachi.value) == '')
          {
          
                thongbaoloi.style.display="block";
                thongbaoloi.innerHTML  = ((thongbaoloi.innerHTML == "")? "<br>Vui lòng nhập địa chỉ<br>" :  thongbaoloi.innerHTML  +="<br>Vui lòng nhập địa chỉ <br>");
                return false;
          }
          else
          {

                     return true;
                    // window.location="dangnhap.html";
          }
}   

function trimfield(str) 
{ 
    return str.replace(/^\s+|\s+$/g,''); 
}
// chitietsanpham
function tang(max){
     var x = f.so_luong.value;
     if(x < max)
       {
      f.so_luong.value = ++x;  
      }
      else
      {
        alert("số lượng trong kho chỉ còn :"+max+"");
      }
    }
  
    function giam(){
     var x = f.so_luong.value;
     if(x!=1)
     {
      f.so_luong.value = --x;
      
    }
    function resetvalue(){
      if(f.so_luong.value < 1)
      {
        f.so_luong.value = 1;
      }
    }
  }
  function check(max) {
   if (f.so_luong.value < 1 || f.so_luong.value == 0) {
    f.so_luong.value = 1;
   } 
   if(f.so_luong.value > max)
   {
    f.so_luong.value = 1;
   }
}


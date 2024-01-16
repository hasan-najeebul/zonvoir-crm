<?php
   include("header.php");  
?>

<?php
   include("sidebar.php");  
?>



<div class="main-content-area">
<div class="container-fluid">


  <nav aria-label="breadcrumb" class="bg-white mb-3 ">
  <ol class="breadcrumb mb-0 align-items-center">
    <li class="breadcrumb-item">
    <a href="#"> 
    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
    
    <svg class=" h-10" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" aria-hidden="true" bis_size="{&quot;x&quot;:398,&quot;y&quot;:96,&quot;w&quot;:24,&quot;h&quot;:44,&quot;abs_x&quot;:430,&quot;abs_y&quot;:420}"><path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" bis_size="{&quot;x&quot;:398,&quot;y&quot;:96,&quot;w&quot;:23,&quot;h&quot;:44,&quot;abs_x&quot;:430,&quot;abs_y&quot;:420}"></path></svg>
    
    </a>
    </li>
    <li class="breadcrumb-item"><a href="#">HRM  <svg class="h-10" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" aria-hidden="true" bis_size="{&quot;x&quot;:398,&quot;y&quot;:96,&quot;w&quot;:24,&quot;h&quot;:44,&quot;abs_x&quot;:430,&quot;abs_y&quot;:420}"><path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" bis_size="{&quot;x&quot;:398,&quot;y&quot;:96,&quot;w&quot;:23,&quot;h&quot;:44,&quot;abs_x&quot;:430,&quot;abs_y&quot;:420}"></path></svg></a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Staff</li>
  </ol>
</nav>

<div class="card">
  <div class="card-header bg-white d-flex justify-content-between align-items-center">
    
    <div>
         <button type="button" class="btn theme-btn"><i class="fa-solid fa-plus"></i> add staff</button>
    </div>
  </div>
  <div class="card-body">
      <table id="example" class="table display- nowrap" style="width:100%">
    <thead>
        <tr>
            <th>Emp ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact No</th>
            <th>Role</th>
            <th>Date of Joining</th>
            <th>Position</th>
            <th>Emp Type</th>
            <th>Status</th>
            <th>Last Logined</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        <tr class="has-hover-options">
            <td >
            Zon-101
            </td>
            <td class="">
               <a href="#">
                <div class="d-flex align-items-center">
                    <div class="w-8"><img class="inline-block h-8 w-8 rounded-full" src="img/user-icon.jpg" alt=""></div>
                    <div class="ms-1">Name</div>
                </div>
                </a>
            </td>
            <td>
              <div class="d-flex align-items-center gap-2">
                  <div>xyz@zonvoir.com</div>

                  <div>
                      <a class="bg-yellow-100 text-yellow-800 text-xs font-medium  px-2.5 py-2 rounded dark:bg-yellow-900 dark:text-yellow-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Email">
                          <i class="fa-solid fa-envelope"></i>
                      </a>
                  </div>

              </div>
            </td>
            <td>
                <div class="d-flex align-items-center gap-2">
                    <div>+91 8860767651</div>
                    <div>
                        <a class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-2 rounded dark:bg-red-900 dark:text-red-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Call">
                            <i class="fa-solid fa-phone"></i>
                        </a>
                    </div>
                  
                    <div>
                        <a class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Send SMS">
                            <i class="fa-solid fa-comment-sms"></i>
                        </a>
                    </div>
                </div>
            </td>
            <td>HR</td>
            <td>01-01-2023</td>
            <td>HR Manager</td>
            <td>Permanent</td>
            <td>
                <label class="relative inline-flex items-center me-5 cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                </label>
            </td>

            <td>
                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-2 rounded dark:bg-blue-900 dark:text-blue-300">1-1-2023 13:45</span>
            </td>
            <td>
              <div class="d-flex align-items-center">
                    <a class="bg-purple-100 text-purple-800 text-xs font-medium me-1 px-2.5 py-2 rounded dark:bg-purple-900 dark:text-purple-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="View">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a class="bg-green-100 text-green-800 text-xs font-medium me-1 px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a class="bg-red-100 text-red-800 text-xs font-medium me-1 px-2.5 py-2 rounded dark:bg-red-900 dark:text-red-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                </div>
            </td>
        </tr>
          <tr class="has-hover-options">
            <td >
            Zon-101
            </td>
            <td class="">
               <a href="#">
                <div class="d-flex align-items-center">
                    <div class="w-8"><img class="inline-block h-8 w-8 rounded-full" src="img/user-icon.jpg" alt=""></div>
                    <div class="ms-1">Name</div>
                </div>
                </a>
            </td>
            <td>
              <div class="d-flex align-items-center gap-2">
                  <div>xyz@zonvoir.com</div>

                  <div>
                      <a class="bg-yellow-100 text-yellow-800 text-xs font-medium  px-2.5 py-2 rounded dark:bg-yellow-900 dark:text-yellow-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Email">
                          <i class="fa-solid fa-envelope"></i>
                      </a>
                  </div>

              </div>
            </td>
            <td>
                <div class="d-flex align-items-center gap-2">
                    <div>+91 8860767651</div>
                    <div>
                        <a class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-2 rounded dark:bg-red-900 dark:text-red-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Call">
                            <i class="fa-solid fa-phone"></i>
                        </a>
                    </div>
                  
                    <div>
                        <a class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Send SMS">
                            <i class="fa-solid fa-comment-sms"></i>
                        </a>
                    </div>
                </div>
            </td>
            <td>HR</td>
            <td>01-01-2023</td>
            <td>HR Manager</td>
            <td>Permanent</td>
            <td>
                <label class="relative inline-flex items-center me-5 cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                </label>
            </td>

            <td>
                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-2 rounded dark:bg-blue-900 dark:text-blue-300">1-1-2023 13:45</span>
            </td>
            <td>
              <div class="d-flex align-items-center">
                    <a class="bg-purple-100 text-purple-800 text-xs font-medium me-1 px-2.5 py-2 rounded dark:bg-purple-900 dark:text-purple-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="View">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a class="bg-green-100 text-green-800 text-xs font-medium me-1 px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a class="bg-red-100 text-red-800 text-xs font-medium me-1 px-2.5 py-2 rounded dark:bg-red-900 dark:text-red-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                </div>
            </td>
        </tr>
          <tr class="has-hover-options">
            <td >
            Zon-101
            </td>
            <td class="">
               <a href="#">
                <div class="d-flex align-items-center">
                    <div class="w-8"><img class="inline-block h-8 w-8 rounded-full" src="img/user-icon.jpg" alt=""></div>
                    <div class="ms-1">Name</div>
                </div>
                </a>
            </td>
            <td>
              <div class="d-flex align-items-center gap-2">
                  <div>xyz@zonvoir.com</div>

                  <div>
                      <a class="bg-yellow-100 text-yellow-800 text-xs font-medium  px-2.5 py-2 rounded dark:bg-yellow-900 dark:text-yellow-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Email">
                          <i class="fa-solid fa-envelope"></i>
                      </a>
                  </div>

              </div>
            </td>
            <td>
                <div class="d-flex align-items-center gap-2">
                    <div>+91 8860767651</div>
                    <div>
                        <a class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-2 rounded dark:bg-red-900 dark:text-red-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Call">
                            <i class="fa-solid fa-phone"></i>
                        </a>
                    </div>
                  
                    <div>
                        <a class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Send SMS">
                            <i class="fa-solid fa-comment-sms"></i>
                        </a>
                    </div>
                </div>
            </td>
            <td>HR</td>
            <td>01-01-2023</td>
            <td>HR Manager</td>
            <td>Permanent</td>
            <td>
                <label class="relative inline-flex items-center me-5 cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                </label>
            </td>

            <td>
                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-2 rounded dark:bg-blue-900 dark:text-blue-300">1-1-2023 13:45</span>
            </td>
            <td>
              <div class="d-flex align-items-center">
                    <a class="bg-purple-100 text-purple-800 text-xs font-medium me-1 px-2.5 py-2 rounded dark:bg-purple-900 dark:text-purple-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="View">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a class="bg-green-100 text-green-800 text-xs font-medium me-1 px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a class="bg-red-100 text-red-800 text-xs font-medium me-1 px-2.5 py-2 rounded dark:bg-red-900 dark:text-red-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                </div>
            </td>
        </tr>
          <tr class="has-hover-options">
            <td >
            Zon-101
            </td>
            <td class="">
               <a href="#">
                <div class="d-flex align-items-center">
                    <div class="w-8"><img class="inline-block h-8 w-8 rounded-full" src="img/user-icon.jpg" alt=""></div>
                    <div class="ms-1">Name</div>
                </div>
                </a>
            </td>
            <td>
              <div class="d-flex align-items-center gap-2">
                  <div>xyz@zonvoir.com</div>

                  <div>
                      <a class="bg-yellow-100 text-yellow-800 text-xs font-medium  px-2.5 py-2 rounded dark:bg-yellow-900 dark:text-yellow-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Email">
                          <i class="fa-solid fa-envelope"></i>
                      </a>
                  </div>

              </div>
            </td>
            <td>
                <div class="d-flex align-items-center gap-2">
                    <div>+91 8860767651</div>
                    <div>
                        <a class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-2 rounded dark:bg-red-900 dark:text-red-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Call">
                            <i class="fa-solid fa-phone"></i>
                        </a>
                    </div>
                  
                    <div>
                        <a class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Send SMS">
                            <i class="fa-solid fa-comment-sms"></i>
                        </a>
                    </div>
                </div>
            </td>
            <td>HR</td>
            <td>01-01-2023</td>
            <td>HR Manager</td>
            <td>Permanent</td>
            <td>
                <label class="relative inline-flex items-center me-5 cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                </label>
            </td>

            <td>
                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-2 rounded dark:bg-blue-900 dark:text-blue-300">1-1-2023 13:45</span>
            </td>
            <td>
              <div class="d-flex align-items-center">
                    <a class="bg-purple-100 text-purple-800 text-xs font-medium me-1 px-2.5 py-2 rounded dark:bg-purple-900 dark:text-purple-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="View">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a class="bg-green-100 text-green-800 text-xs font-medium me-1 px-2.5 py-2 rounded dark:bg-green-900 dark:text-green-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a class="bg-red-100 text-red-800 text-xs font-medium me-1 px-2.5 py-2 rounded dark:bg-red-900 dark:text-red-300" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                </div>
            </td>
        </tr>
        
       
    </tbody>

</table>
 
  </div>
</div>




    </div>
 </div>
 
 
 <?php
   include("footer.php");  
?>
 
<script>
  $(document).ready(function () {
        $('#example').DataTable({
            responsive: true,
            scrollX: 'auto',
            autoWidth: true,
            language: { search: '', searchPlaceholder: "Search..." },
        });
    });  
</script>


<script>
// Initialize tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
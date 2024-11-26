<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./index.css" />
  <style>
  .card {
  width: 100%;
  height: 400px; /* Chiều cao mặc định của card */
  overflow: hidden;
  margin-bottom: 20px; /* Thêm khoảng cách giữa các thẻ */
}

.card-img-top {
  width: 100%;
  height: 280px; /* Chiều cao cố định cho ảnh */
}

/* Tùy chọn: Áp dụng chiều cao lớn hơn chỉ trên các màn hình lớn hơn 992px */
@media (min-width: 992px) { /* Áp dụng cho màn hình lớn hơn 992px */
  .card {
    height: calc(400px + 2cm); /* Tăng chiều cao thẻ thêm 2cm */
  }
}

main{
  width: 100%;
  min-height: 100vh;
  background-image: url('./assets/image/maxresdefault.jpg');
  background-position: center;
  background-size: cover;
  background-repeat: none;
}

.nav-item{
  background-color: #71717a;
  color: #fff;
}
</style>

</head>

<body>
  <header>
    <div class="container mb-3 header-wrapper">
      <div class="d-flex align-items-center">
        <button class="gap-2 d-flex align-items-center btn btn-light" type="button" data-bs-toggle="modal"
          data-bs-target="#categoryModal">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-circle-plus">
            <circle cx="12" cy="12" r="10" />
            <path d="M8 12h8" />
            <path d="M12 8v8" />
          </svg>
          Thêm mới danh mục
        </button>
      </div>
      <div class="d-flex align-items-center">
        <div class="dropdown d-flex align-items-center me-3">
          <div data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-bell">
              <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
              <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
            </svg>
          </div>
          <ul class="dropdown-menu shadow" style="width: 300px">
            <li class="dropdown-item">
              <div class="text-wrap text-success">
                Công việc #12312345 sắp hết hạn.
              </div>
            </li>
            <li class="dropdown-item">
              <div class="text-wrap text-success">
                Công việc #12312345 sắp hết hạn.
              </div>
            </li>
          </ul>
        </div>
        <div class="d-flex align-items-center dropdown">
          <div class="header-user" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="header-user__avatar">
              <img
                src="https://ik.imagekit.io/freeflo/production/49c5f1d8-037e-4478-a530-29db4e21a5fa.png?tr=w-1200,q-75&alt=media&pr-true"
                alt="" />
            </div>
          </div>
          <ul class="dropdown-menu">
            <li>
              <button type="button" class="gap-2 d-flex align-items-center dropdown-item" data-bs-toggle="modal"
                data-bs-target="#activityModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="lucide lucide-logs">
                  <path d="M13 12h8" />
                  <path d="M13 18h8" />
                  <path d="M13 6h8" />
                  <path d="M3 12h1" />
                  <path d="M3 18h1" />
                  <path d="M3 6h1" />
                  <path d="M8 12h1" />
                  <path d="M8 18h1" />
                  <path d="M8 6h1" />
                </svg>
                Lịch sử hoạt động
              </button>
            </li>
            <li>
              <a class="gap-2 d-flex align-items-center dropdown-item" href="./logout"><svg
                  xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="lucide lucide-log-out">
                  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                  <polyline points="16 17 21 12 16 7" />
                  <line x1="21" x2="9" y1="12" y2="12" />
                </svg>
                Đăng xuất
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <main class="container">
    <div class="pb-2 d-flex justify-content-between align-items-start border-bottom">
      <div>
        <h2 class="fw-bold text-dark text-uppercase">Hôm nay</h2>
        <div class="text-secondary">Thứ sáu, 28 tháng 9</div>
        <img style="width:50px" src="./assets/image/bear-hand-drawn-animal-toy-svgrepo-com.svg">
        <img style="width:50px" src="./assets/image/space-ship-hand-drawn-transport-svgrepo-com.svg">
        <img style="width:50px" src="./assets/image/rattle-hand-drawn-baby-tool-svgrepo-com.svg">
      </div>
      <div>
        <button class="gap-2 d-flex align-items-center btn btn-dark" id="btn-add" type="button" data-bs-toggle="modal"
          data-bs-target="#taskModal">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-circle-plus">
            <circle cx="12" cy="12" r="10" />
            <path d="M8 12h8" />
            <path d="M12 8v8" />
          </svg>Thêm mới

        </button>

        <div class="fade modal" id="taskModal" tabindex="-1" aria-labelledby="taskModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <!-- Form thêm công việc -->
      <form action="add_task.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
                <input type="hidden" id="taskIdInput" name="taskId">
                <div class="mb-3 form-floating">
                  <input type="text" id="titleInput" class="form-control" name="title" placeholder="" required />
                  <label for="title">Tiêu đề</label>
                </div>

                <div class="mb-3 form-floating">
                  <textarea class="form-control" id="descInput" placeholder="" name="description" style="height: 100px"></textarea>
                  <label for="description">Mô tả</label>
                </div>

                <div class="mb-3 form-floating">
                  <select class="form-select" id="categorySelect" name="category">
                    <?php
                      // Kết nối tới cơ sở dữ liệu (đảm bảo thay đổi thông tin kết nối theo đúng của bạn)
                      $servername = "localhost";
                      $username = "root";
                      $password = "";
                      $dbname = "task_management"; // Thay thế bằng tên cơ sở dữ liệu của bạn

                      // Tạo kết nối
                      $conn = new mysqli($servername, $username, $password, $dbname);

                      // Kiểm tra kết nối
                      if ($conn->connect_error) {
                          die("Kết nối thất bại: " . $conn->connect_error);
                      }

                      $sql = "SELECT DISTINCT category_name FROM categories";

                      $result = $conn->query($sql);

                      // Kiểm tra nếu có kết quả và hiển thị chúng trong dropdown
                      if ($result->num_rows > 0) {
                          // Lặp qua từng dòng kết quả và thêm vào các option
                          while($row = $result->fetch_assoc()) {
                              echo '<option value="' . htmlspecialchars($row['category_name']) . '">' . htmlspecialchars($row['category_name']) . '</option>';
                          }
                      }


                      // Đóng kết nối
                      $conn->close();
                      ?>
                  </select>
                  <label for="category">Chọn nhóm công việc</label>
                </div>

                <div class="mb-3 form-floating">
                  <select class="form-select" id="prioritySelect" name="priority">
                    <option value="low">Thấp</option>
                    <option value="medium" selected>Trung bình</option>
                    <option value="high">Cao</option>


                  </select>
                  <label for="priority">Chọn mức độ ưu tiên</label>
                </div>

                <div class="mb-3">
                  <label for="dueDate" class="form-label">Ngày hết hạn</label>
                  <input type="date" id="dueDateInput" class="form-control" name="dueDate" />
                </div>

                <div class="mb-3">
                  <label for="attachment" class="form-label">File đính kèm (Nếu có)</label>
                  <input type="file" class="form-control" name="attachment" />
                </div>
              </div>  
              <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>
                <button type="submit" id="btn-submit" class="btn btn-dark">Thêm mới công việc</button>
              </div>
</form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task_management";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Query categories excluding predefined ones
$query = "SELECT distinct category_name FROM categories";

// Sử dụng prepared statement để tránh SQL Injection
$stmt = $conn->prepare($query);

if ($stmt === false) {
    die("Lỗi trong việc chuẩn bị câu truy vấn: " . $conn->error);
}

$stmt->execute();
$result = $stmt->get_result();
$categories = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conn->close();
?>

<div class="my-3 tab-header">
    <ul class="nav-pills tabs-list" id="myTab" role="tablist">
        <!-- Hiển thị các danh mục lấy từ cơ sở dữ liệu -->
        <?php
        $i = 6;
        foreach ($categories as $category): ?>
            <li class="nav-item position-relative me-3" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-<?php echo $i; ?>" role="tab" aria-controls="tab-<?php echo $i; ?>" aria-selected="false">
                    <?php echo htmlspecialchars($category['category_name']); ?>
                </a>
                <div class="position-absolute top-0 start-100 translate-middle px-1 text-center bg-white rounded-circle">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="#000" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </div>
            </li>
        <?php
        $i++;
        endforeach;
        ?>
    </ul>
</div>

<div class="tab-content">
    <?php
    // Reconnect to fetch tasks dynamically for each category tab
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Fetch tasks for each category dynamically
    foreach ($categories as $index => $category) {
        // Get tasks for current category
        $category_name = $category['category_name'];
        $sql = "SELECT tasks.title, tasks.task_id, tasks.description, tasks.category, tasks.priority, tasks.image, tasks.due_date
                FROM tasks
                JOIN categories ON tasks.category = categories.category_name
                WHERE categories.category_name = ?";

        // Use prepared statement to avoid SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $category_name);
        $stmt->execute();
        $task_result = $stmt->get_result();

        echo '<div class="tab-pane fade" id="tab-' . ($index + 6) . '" role="tabpanel">';
        echo '<div class="row">';

        // Hiển thị công việc cho danh mục này
        while ($row = $task_result->fetch_assoc()) {
            // Kiểm tra nếu không có hình ảnh thì sử dụng hình mặc định
            $imageSrc = !empty($row['image']) ? 'data:image/jpeg;base64,' . base64_encode($row['image']) : 'https://cdn-media.sforum.vn/storage/app/media/THANHAN/avatar-trang-99.jpg';
            
            // Giới hạn độ dài mô tả
            $maxLength = 0;
            $description = $row['description'];
            $shortDescription = (strlen($description) > $maxLength) ? substr($description, 0, $maxLength) . '...' : $description;
            $fullDescription = $description; // Mô tả đầy đ

            echo '<div class="col-12 col-md-3">
                    <div class="card">
                        <img src="' . $imageSrc . '" class="card-img-top" alt="Card image" />
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($row['title']) . '</h5>
                            <p class="card-text">' . htmlspecialchars($shortDescription) . '</p>
                            <p class="card-text" style="color: green;">' . htmlspecialchars($row['due_date']) . '</p>
                            <div class="d-flex gap-3">
                              <button class="text-white btn btn-warning btnTaskInfo" type="button" data-bs-toggle="modal" data-bs-target="#taskModal" data-task="' . htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8') . '">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen">
                                      <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                      <path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                  </svg>
                              </button>

                              <form action="delete_task.php" method="POST">
                                <input type="hidden" name="id" value="'. $row['task_id'] .'">
                                <button class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide-trash-2 lucide">
                                        <path d="M3 6h18" />
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                        <line x1="10" x2="10" y1="11" y2="17" />
                                        <line x1="14" x2="14" y1="11" y2="17" />
                                    </svg>
                                </button>
                              </form>

                              <!-- Third button (Example: Edit button) -->
                              <button class="btn btn-info btnTaskDescription" type="button" data-bs-toggle="modal" data-bs-target="#taskDescriptionModal" data-title="'. $row['title'] .'" data-date="' . $row['due_date'] . '" data-description="' . htmlspecialchars($description) . '">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                      <path d="M2.5 12s3.5-7 9.5-7 9.5 7 9.5 7-3.5 7-9.5 7-9.5-7-9.5-7z" />
                                      <circle cx="12" cy="12" r="3" />
                                  </svg>
                              </button>
                            </div>
                        </div>
                    </div>
                </div>';
        }

        echo '</div>';
        echo '</div>';
    }

    // Close connection
    $conn->close();
    ?>
</div>

<!-- Modal để xem mô tả đầy đủ -->
<div class="modal fade" id="taskDescriptionModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="taskModalLabel">Mô tả công việc</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          Tên công việc:
          <span id="taskTitle"></span>
        </div>
        <div class="mb-3">
          Mô tả:
          <div style="max-width: 100%; word-break: break-word;" id="taskDescription"></span>
        </div>
        <div class="mb-3">
          Ngày hết han:
          <span id="taskDueDate"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

    <!-- <img style="width:100%; border-radius: 12px;" src="./assets/image/maxresdefault.jpg"> -->
  </main>

  <div class="fade modal" id="categoryModal" tabindex="-1" aria-labelledby="categoryModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="./addCategory" method="post" autocomplete="off">
          <div class="modal-header">
            <h5 class="modal-title">Thêm mới danh mục</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3 form-floating">
              <input type="text" class="form-control" name="categoryName" id="categoryName" placeholder="" required />
              <label for="name">Tên danh mục</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-dark">Thêm mới</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="activityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Lịch sử hoạt động</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <li class="list-group-item list-group-item-light text-dark">
              <div class="d-flex w-100 justify-content-between align-items-center">
                <div>Bạn vừa thêm một công việc</div>
                <small class="text-danger">10 phút trước</small>
              </div>
            </li>
            <li class="list-group-item list-group-item-light text-dark">
              <div class="d-flex w-100 justify-content-between align-items-center">
                <div>Bạn vừa cập nhật công việc</div>
                <small class="text-danger">10 phút trước</small>
              </div>
            </li>
            <li class="list-group-item list-group-item-light text-dark">
              <div class="d-flex w-100 justify-content-between align-items-center">
                <div>Bạn vừa xóa một công việc</div>
                <small class="text-danger">10 phút trước</small>
              </div>
            </li>
            <li class="list-group-item list-group-item-light text-dark">
              <div class="d-flex w-100 justify-content-between align-items-center">
                <div>Bạn vừa thêm một công việc</div>
                <small class="text-danger">10 phút trước</small>
              </div>
            </li>
            <li class="list-group-item list-group-item-light text-dark">
              <div class="d-flex w-100 justify-content-between align-items-center">
                <div>Bạn vừa thêm một công việc</div>
                <small class="text-danger">10 phút trước</small>
              </div>
            </li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const buttonInfo = document.querySelectorAll('.btnTaskInfo');
    const taskModal = document.getElementById('taskModal');
    const titleInput = document.getElementById('titleInput');
    const descInput = document.getElementById('descInput');
    const categorySelect = document.getElementById('categorySelect');
    const prioritySelect = document.getElementById('prioritySelect');
    const dueDateInput =document.getElementById('dueDateInput');
    const taskIdInput = document.getElementById('taskIdInput');
    const btnSubmit = document.getElementById('btn-submit');
    const btnAdd = document.getElementById('btn-add');

    const btnTaskDescription = document.querySelectorAll('.btnTaskDescription');
    const taskDescription = document.getElementById('taskDescription');
    const taskTitle = document.getElementById('taskTitle');
    const taskDueDate = document.getElementById('taskDueDate');

    buttonInfo.forEach(btn => {
      btn.addEventListener("click", (event) => {
          const task = event.currentTarget.getAttribute("data-task");
          const taskObject = JSON.parse(task);
          console.log(taskObject);
          titleInput.value = taskObject.title;
          dueDateInput.value = taskObject.due_date.split(" ")[0];
          descInput.value = taskObject.description;
          categorySelect.value = taskObject.category;
          prioritySelect.value = taskObject.priority;
          taskIdInput.value = taskObject.task_id;
          btnSubmit.innerText = "Cập nhật công việc";
      });
    });

    btnTaskDescription.forEach(btn => {
      btn.addEventListener("click", (event) => {
        const description = event.currentTarget.getAttribute("data-description");
        const title = event.currentTarget.getAttribute("data-title");
        const dueDate = event.currentTarget.getAttribute("data-date");
        taskDescription.innerText = description
        taskTitle.innerText = title
        taskDueDate.innerText = dueDate
      });
    });

    btnAdd.addEventListener("click", () => {
      btnSubmit.innerText = "Thêm mới công việc";
    })
    
  </script>
</body>

</html>
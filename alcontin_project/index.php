<?php
session_start();
require_once('connection.php');
require_once('classes/User.php');

$user = new User($connect);
$result = $user->getAllUsers();

if (!isset($_SESSION['first_name'])) {
    header("Location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>

<!-- WELCOME HEADER -->
<div class="welcome-bar">
    <div>
        <span class="welcome-text"> Welcome,</span>
        <span class="welcome-name">
            <?= $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>
        </span>
    </div>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

<style>
    .welcome-bar {
        background: linear-gradient(90deg, #4f9bfeff, #7db8ffff); /* Light blue gradient */
        padding: 25px 35px;
        font-family: 'Poppins', sans-serif;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-radius: 0 0 12px 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .welcome-text {
        font-size: 2rem;
        font-weight: 800;
        color: #000;  /* Black text for “Welcome” */
        margin-right: 10px;
    }

    .welcome-name {
        font-size: 2rem;
        font-weight: 800;
        color: #000;  /* Black name */
    }

    .logout-btn {
        background-color: #dc3545;
        border: none;
        color: white;
        padding: 12px 25px;
        border-radius: 10px;
        font-size: 1.1rem;
        transition: 0.3s;
    }

    .logout-btn:hover {
        background-color: #c82333;
        transform: scale(1.05);
    }
</style>


<div class="container pt-4">
    <button type="button" class="btn btn-primary mb-3 float-end" data-bs-toggle="modal" data-bs-target="#insertModal">
        Add User
    </button>

    <table class="table table-striped table-hover table-bordered">
        <thead class="table-primary">
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Username</th>
                <th>Password</th>
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $user): ?>
            <tr>
                <td><?= $user['user_id'] ?></td>
                <td><?= $user['first_name'] ?></td>
                <td><?= $user['last_name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['gender'] ?></td>
                <td><?= $user['user_address'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['password'] ?></td>
                <td><?= $user['date_created'] ?></td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#updateModal<?= $user['user_id'] ?>">
                        Update
                    </button>

                    <button type="button" class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal<?= $user['user_id'] ?>">
                        Delete
                    </button>
                </td>
            </tr>

            <!-- Insert Modal -->
<div class="modal fade" id="insertModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="backend/user_code.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-2"><input type="text" class="form-control" name="first_name" placeholder="First Name" required></div>
          <div class="mb-2"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required></div>
          <div class="mb-2"><input type="text" class="form-control" name="email" placeholder="Email" required></div>
          <div class="mb-2"><input type="text" class="form-control" name="gender" placeholder="Gender" required></div>
          <div class="mb-2"><input type="text" class="form-control" name="user_address" placeholder="Address" required></div>
          <div class="mb-2"><input type="text" class="form-control" name="username" placeholder="Username" required></div>
          <div class="mb-2"><input type="text" class="form-control" name="password" placeholder="Password" required></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="btn_save">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


            <!-- UPDATE MODAL -->
            <div class="modal fade" id="updateModal<?= $user['user_id'] ?>" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="backend/user_code.php" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title">Update User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="first_name" value="<?= $user['first_name'] ?>" required>
                                </div>
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="last_name" value="<?= $user['last_name'] ?>" required>
                                </div>
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="email" value="<?= $user['email'] ?>" required>
                                </div>
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="gender" value="<?= $user['gender'] ?>" required>
                                </div>
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="user_address" value="<?= $user['user_address'] ?>" required>
                                </div>
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>" required>
                                </div>
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="password" value="<?= $user['password'] ?>" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-warning" name="update_btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- DELETE MODAL -->
            <div class="modal fade" id="deleteModal<?= $user['user_id'] ?>" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="backend/user_code.php" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                                <p>Are you sure you want to delete 
                                    <strong><?= $user['first_name'] . " " . $user['last_name'] ?></strong>?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger" name="delete_btn">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- ADD MODAL -->
<div class="modal fade" id="insertModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="backend/user_code.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-2">
            <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
          </div>
          <div class="mb-2">
            <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
          </div>
          <div class="mb-2">
            <input type="text" class="form-control" name="email" placeholder="Email" required>
          </div>
          <div class="mb-2">
            <input type="text" class="form-control" name="gender" placeholder="Gender" required>
          </div>
          <div class="mb-2">
            <input type="text" class="form-control" name="user_address" placeholder="Address" required>
          </div>
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <input type="text" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="btn_save">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

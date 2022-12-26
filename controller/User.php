<?php
require '../model/Database.php';
require 'Alert.php';
require 'Session.php';
class User
{
    public function Register()
    {
        if (isset($_POST['register'])) :

            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $lastname = $_POST['lastname'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $stmt = Database::getInstance()->prepare(
                "INSERT INTO `users`(`firstname`, `middlename`, `lastname`, `address`, `phone`, `email`, `password`) 
                VALUES (?,?,?,?,?,?,?);
                "
            );
            $stmt->bind_param('sssssss', $firstname, $middlename, $lastname, $address, $phone, $email, $password);

            if ($stmt->execute()) :
                Alert::success('Registration Success');
            else :
                Alert::warning('Registration Error');
            endif;
        endif;
    }

    public function Login()
    {
        if (isset($_POST['login'])) :
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $stmt = Database::getInstance()->prepare(
                "SELECT * 
                FROM `users` 
                WHERE email = ? 
                AND password = ?"
            );
            $stmt->bind_param('ss', $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows == 0) :
                Alert::warning('Incorrect Email or Password!');
            else :

                $user = $result->fetch_object();

                $_SESSION['user'] = array(
                    'id' => $user->id,
                    'email' => $user->email,
                    'nickname' => $user->firstname,
                    'type' => $user->type
                );

                header('location:home.php');
            endif;
        endif;
    }

    public function SetBooking()
    {
        if (isset($_POST['booking'])) :
            $id = $_POST['id'];
            $location = $_POST['location'];
            $date = $_POST['date'];
            $service = $_POST['service'];
            $package = $_POST['package'];
            $status = 'Pending';

            $stmt = Database::getInstance()->prepare(
                "INSERT INTO `reservations`(`user_id`, `location`, `date`, `services`, `package`, `status`) 
            VALUES (?,?,?,?,?,?)"
            );

            $stmt->bind_param('ssssss', $id, $location, $date, $service, $package, $status);
            if ($stmt->execute()) :
                Alert::success('Reservation Successful.');
            else :
                Alert::warning('Reservation Error!');
            endif;

        endif;
    }

    public function ShowAllBooking()
    {

        $stmt = Database::getInstance()->prepare(
            "SELECT * FROM users 
            INNER JOIN reservations 
            ON users.id = reservations.user_id ORDER BY date DESC"
        );

        $stmt->execute();
        $reservation = $stmt->get_result();

        return $reservation;
    }
    public function ShowBooking($id)
    {
        $stmt = Database::getInstance()->prepare(
            "SELECT * FROM reservations 
            WHERE user_id = ?
            "
        );
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $bookings = $stmt->get_result();

        return $bookings;
    }

    public function EditBooking()
    {
        if (isset($_POST['editbooking'])) :
            $booking_id = $_POST['booking_id'];
            $location = $_POST['location'];
            $date = $_POST['date'];
            $service = $_POST['service'];
            $package = $_POST['package'];
            $status = 'Re-Scheduled';

            $stmt = Database::getInstance()->prepare(
                "UPDATE `reservations` 
            SET `location`= ? ,`date`= ? ,`services`= ? ,`package`= ?, `status` = ?
            WHERE reservations.id = ?
            "
            );

            $stmt->bind_param('ssssss', $location, $date, $service, $package, $status, $booking_id);

            if ($this->CheckApproval($booking_id)) :
                if ($stmt->execute()) :
                    Alert::success("Reschedule Success");
                else :
                    Alert::warning('Reschedule Unsuccessful');
                endif;
            else :
                Alert::info('Reschedule Declined, Transaction is already settled by JL Photography, Please Contact us for further assistance.');
            endif;

        endif;
    }

    public function CancelBooking()
    {
        if (isset($_POST['cancelbooking'])) :

            $booking_id = $_POST['booking_id'];

            $stmt = Database::getInstance()->prepare("DELETE FROM `reservations` WHERE id = ?");
            $stmt->bind_param('i', $booking_id);

            if ($this->CheckApproval($booking_id)) :
                if ($stmt->execute()) :
                    Alert::success('Schedule Successfully Canceled');
                else :
                    Alert::warning("Schedule Cancellation Error");
                endif;
            else :
                Alert::info('Cancellation Declined, Transaction is already settled by JL Photography, Please Contact us for further assistance.');
            endif;

        endif;
    }

    public function CheckApproval($booking_id)
    {
        // Validation.
        $check_stmt = Database::getInstance()->prepare("SELECT `status` FROM `reservations` WHERE id = ?");
        $check_stmt->bind_param('i', $booking_id);
        $check_stmt->execute();
        $reservations = $check_stmt->get_result();
        $reservation = $reservations->fetch_object();

        return $reservation->status !== 'Approved';
    }

    // Admin.

    public function Action()
    {
        if(isset($_POST['settle'])):
            $booking_id = $_POST['booking_id'];
            $status = 'Approved';

            $stmt = Database::getInstance()->prepare(
            "UPDATE `reservations` SET `status`=? WHERE id = ? ");
            $stmt->bind_param('si', $status, $booking_id);
            if($stmt->execute()):
                Alert::success('Booking Approved');
            else:
                Alert::warning('Booking Approval Error');
            endif;
        elseif(isset($_POST['decline'])):
            $booking_id = $_POST['booking_id'];
            $status = 'Decline';

            $stmt = Database::getInstance()->prepare(
            "UPDATE `reservations` SET `status`=? WHERE id = ? ");
            $stmt->bind_param('si', $status, $booking_id);

            if($stmt->execute()):
                Alert::success('Booking Declined');
            else:
                Alert::warning('Booking Declining Error');
            endif;
        endif;
    }
}

$user = new User;

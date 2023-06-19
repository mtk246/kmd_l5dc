<?php
session_start();
require_once("./ErrorHandler/error.php");
require_once("./Components/header.php");
require_once("./Components/navbar.php");
require_once("./Controller/Camping.php");
require_once("./Controller/Booking.php");
require_once("./Controller/Review.php");
require_once("./Controller/CountryList.php");

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";

$camping_id = isset($_POST['camping_id']) ? $_POST['camping_id'] : "";

if (isset($_GET['camping_id'])) {
  $camping_id = $_GET['camping_id'];
}

if ($camping_id === "") {
    $redirectUrl = CONST_BASE_URL . '/camping.php';

    header("Location: $redirectUrl");
    exit();
}

$camping = new Camping();
$campingData = $camping->getOneCampingData($camping_id);
$decodeCampingData = json_decode($campingData, true);

$booking = new Booking();
$bookingData = $booking->getOneBookingData($user_id, $camping_id);
$decodeBookingData = json_decode($bookingData, true);

$review = new Review();
$reviewData = $review->getReviews();
$decodeReviewData = json_decode($reviewData, true);

if (isset($_POST['edit_booking']) && isset($_POST['booking_id'])) {
  $bookingId = $_POST['booking_id'];
  $bookingById = $booking->getOneBookingDataById($bookingId);
  $decodeBookingById = json_decode($bookingById, true);
}
?>
<div class="my-16">
  <div class="pt-2">
    <?php if (isset($_GET['book']) && $_GET['book'] === 'success') { ?>
      <div class="bg-green-600 text-center p-3 text-white mb-5 rounded">
        <?php echo $decodeCampingData[0]['name']; ?> is booked !!
      </div>
    <?php } ?>
    <?php if (isset($_GET['book']) && $_GET['book'] === 'failed') { ?>
      <div class="bg-green-600 text-center p-3 text-white mb-5 rounded">
        <?php echo $decodeCampingData[0]['name']; ?> got an error !!
      </div>
    <?php } ?>

    <?php if (isset($_GET['update']) && $_GET['update'] === 'success') { ?>
      <div class="bg-blue-600 text-center p-3 text-white mb-5 rounded">
        <?php echo $decodeCampingData[0]['name']; ?> booking is updated !!
      </div>
    <?php } ?>
    <?php if (isset($_GET['update']) && $_GET['update'] === 'failed') { ?>
      <div class="bg-blue-600 text-center p-3 text-white mb-5 rounded">
        <?php echo $decodeCampingData[0]['name']; ?> got an error while updating !!
      </div>
    <?php } ?>

    <?php if (isset($_GET['delete']) && $_GET['delete'] === 'success') { ?>
      <div class="bg-red-600 text-center p-3 text-white mb-5 rounded">
        <?php echo $decodeCampingData[0]['name']; ?> booking is deleted !!
      </div>
    <?php } ?>
    <?php if (isset($_GET['delete']) && $_GET['delete'] === 'failed') { ?>
      <div class="bg-red-600 text-center p-3 text-white mb-5 rounded">
        <?php echo $decodeCampingData[0]['name']; ?> got an error while deleting !!
      </div>
    <?php } ?>

    <?php 
    if (isset($_POST['edit_booking']) && isset($_POST['booking_id'])) {
    ?>
      <div class="bg-white border p-3 text-center">
        <form action="./edit_booking.php" method="POST">
          <div class="text-center my-3">
            <h2>Edit Booking Date</h2>
            <div date-rangepicker class="flex items-center text-center justify-center">
              <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                </div>
                <input name="start_date" type="text" value="<?php echo $decodeBookingById[0]['start_date']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
              </div>
              <span class="mx-4 text-gray-500">to</span>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                </div>
                <input name="end_date" type="text" value="<?php echo $decodeBookingById[0]['end_date']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
              </div>
            </div>
          </div>
          <input type="hidden" value="<?php echo $decodeBookingById[0]['camping_site_id']; ?>" name="camping_id">
          <input type="hidden" value="<?php echo $decodeBookingById[0]['id']; ?>" name="booking_id">
          <button
            type="submit"
            class="mt-5 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2"
            name="edit_booking"
          >
            Update
          </button>
        </form>
      </div>
    <?php } ?>
    
    <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-4 lg:gap-x-8 lg:px-8">
      <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
        <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-featured-product-shot.jpg" alt="Model wearing plain white basic tee." class="h-full w-full object-cover object-center">
      </div>
    </div>

    <!-- Product info -->
    <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
      <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
            <?php echo $decodeCampingData[0]['name']; ?>
        </h1>
      </div>

      <!-- Options -->
      <div class="mt-4 lg:row-span-3 lg:mt-0">
        <?php if ($user_id !== "") { ?>
            <form class="mt-10">
        <?php } ?>
        <?php if ($user_id === "") { ?>  
            <form class="mt-10" action="<?php echo CONST_BASE_URL; ?>/login.php" method="POST">
        <?php } ?>
          <?php if ($user_id === "") { ?> 
          <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" type="button">
          <?php } ?>
          <?php if ($user_id !== "") { ?> 
          <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" type="button">
          <?php } ?>
                <?php if ($user_id !== "") { ?>
                    Book Now
                <?php } ?>
                <?php if ($user_id === "") { ?>
                    Register / Login to make a booking
                <?php } ?>
          </button>
        </form>

          <?php if ($user_id !== "" && count($decodeBookingData) > 0) { ?> 
          <button data-modal-target="defaultModal2" data-modal-toggle="defaultModal2" class="mt-2 flex w-full items-center justify-center rounded-md border border-transparent bg-gray-600 px-8 py-3 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" type="button">
            Show My Booking
          </button>
          <?php } ?>

        <!-- Reviews -->
        <div class="mt-6">
          <h3 class="sr-only">Reviews</h3>
          <div class="">
            <form action="./submit_review.php" method="POST">
              <input type="hidden" value="<?php echo $decodeBookingData[0]['camping_site_id']; ?>" name="camping_id">
              <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
              <textarea
                id="message"
                rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write your thoughts here..."
                name="message"
                required
              >t
              </textarea>
              <button
                class="mt-2 flex w-full items-center justify-center rounded-md border border-transparent bg-blue-600 px-8 py-3 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                type="submit"
              >
                Submit Review
              </button>
            </form>
          </div>
        </div>
      </div>

      <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
        <!-- Description and details -->
        <div>
          <h3 class="sr-only">Description</h3>

          <div class="space-y-6">
            <p class="text-base text-gray-900">
                <?php echo CountryList::getConstantArray()[$decodeCampingData[0]['location']]; ?>
            </p>
          </div>
        </div>

        <div class="mt-10">
          <h2 class="text-sm font-medium text-gray-900">Details</h2>

          <div class="mt-4 space-y-6">
            <p class="text-sm text-gray-600">
                <?php echo $decodeCampingData[0]['description']; ?>
            </p>
          </div>
        </div>
      </div>

    <div class="comments">
      <?php foreach($decodeReviewData as $review) { ?>
        <div class="flex flex-col bg-white my-5 border p-3 rounded">
            <div>
              <?php echo $review['name']; ?>
            </div>
            <div class="pt-8">
              <?php echo $review['comment']; ?>
            </div>
        </div>
      <?php } ?>
    </div>
    </div>
  </div>
  <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-2xl max-h-full">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <form action="./book.php" method="POST">
              <!-- Modal header -->
              <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    <?php echo $decodeCampingData[0]['name']; ?>
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="text-center my-10">
                <div date-rangepicker class="flex items-center text-center justify-center">
                  <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input name="start_date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                  </div>
                  <span class="mx-4 text-gray-500">to</span>
                  <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input name="end_date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                  </div>
                </div>
              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <input
                      type="hidden"
                      name="camping_id"
                      value="<?php echo $decodeCampingData[0]['id']; ?>"
                    />
                    <button
                      type="submit"
                      data-modal-hide="defaultModal"
                      type="button"
                      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                      Book
                    </button>
                  <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
              </div>
            </form>
          </div>
      </div>
  </div>
  <div id="defaultModal2" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-2xl max-h-full">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    <?php echo $decodeCampingData[0]['name']; ?>
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal2">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="text-center">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Start Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    End Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($decodeBookingData as $booking) { ?>
                              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <?php echo $booking['start_date']; ?>
                                </td>
                                <td class="px-6 py-4">
                                  <?php echo $booking['end_date']; ?>
                                </td>
                                <td class="px-6 py-4">
                                  <div class='flex flex-row'>
                                    <form action="#" method="POST" class="px-2">
                                      <input type="hidden" name="camping_id" value="<?php echo $booking['camping_site_id']; ?>">
                                      <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
                                      <button type="submit" name="edit_booking" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Edit
                                      </button>
                                    </form>
                                    <form action="./delete_booking.php" method="POST">
                                      <input type="hidden" name="camping_id" value="<?php echo $booking['camping_site_id']; ?>">
                                      <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
                                      <button type="submit" name="delete_booking" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Delete
                                      </button>
                                    </form>
                                  </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <button data-modal-hide="defaultModal2" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Close</button>
              </div>
          </div>
      </div>
  </div>
</div>

<?php
require_once("./Components/footer.php");
?>
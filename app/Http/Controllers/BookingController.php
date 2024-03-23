<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Shipping;
use Illuminate\Http\Request;
use DB;
use PDF;

class BookingController extends Controller
{
    public function manageBooking() {
        $bookings = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->join('payments', 'orders.id', '=', 'payments.order_id')
            ->select('orders.*', 'customers.first_name', 'customers.last_name', 'payments.payment_type',
                'payments.payment_status')->get();

        return view('admin.booking.manage-booking',[
            'bookings' => $bookings
        ]);
    }

    public function bookingDetails($id) {
        $booking = Order::find($id);
        $customer = Customer::find($booking->customer_id);
        $shipping = Shipping::find($booking->shipping_id);
        $payment = Payment::where('order_id', $booking->id)->first();
        $orderDetails = OrderDetail::where('order_id', $booking->id)->get();

        return view('admin.booking.booking-details', [
            'booking'     => $booking,
            'customer'  =>  $customer,
            'shipping'  =>  $shipping,
            'payment'   =>  $payment,
            'orderDetails'  =>  $orderDetails
        ]);
    }

    public function bookingInvoice($id) {
        $booking = Order::find($id);
        $customer = Customer::find($booking->customer_id);
        $shipping = Shipping::find($booking->shipping_id);
        $payment = Payment::where('order_id', $booking->id)->first();
        $orderDetails = OrderDetail::where('order_id', $booking->id)->get();

        return view('admin.booking.booking-invoice', [
            'booking'     => $booking,
            'customer'  =>  $customer,
            'shipping'  =>  $shipping,
            'payment'   =>  $payment,
            'orderDetails'  =>  $orderDetails
        ]);
    }

    public function bookingInvoiceDownload($id) {
        $booking = Order::find($id);
        $customer = Customer::find($booking->customer_id);
        $shipping = Shipping::find($booking->shipping_id);
        $payment = Payment::where('order_id', $booking->id)->first();
        $orderDetails = OrderDetail::where('order_id', $booking->id)->get();

        $pdf = PDF::loadView('admin.booking.download-invoice', [
            'booking'     => $booking,
            'customer'  =>  $customer,
            'shipping'  =>  $shipping,
            'payment'   =>  $payment,
            'orderDetails'  =>  $orderDetails,
        ]);
        return $pdf->stream('invoice.pdf');
    }

    public function editBooking($id) {
        $booking = Order::find($id);
        $customer = Customer::find($booking->customer_id);
        $shipping = Shipping::find($booking->shipping_id);
        $payment = Payment::where('order_id', $booking->id)->first();
        $orderDetails = OrderDetail::where('order_id', $booking->id)->get();

        return view('admin.booking.edit-booking', [
            'booking'     => $booking,
            'customer'  =>  $customer,
            'shipping'  =>  $shipping,
            'payment'   =>  $payment,
            'orderDetails'  =>  $orderDetails
        ]);
    }

    public function updatePaymentStatus(Request $request) {
        $payment = Payment::find($request->payment_id);
        $payment->payment_status = $request->payment_status;
        $payment->save();

        return redirect('/manage/booking')->with('message', 'Payment Status Updated!');
    }
    public function updateBookingStatus(Request $request) {
        $booking = Order::find($request->booking_id);
        $booking->order_status = $request->booking_status;
        $booking->save();

        return redirect('/manage/booking')->with('message', 'Booking Status Updated!');
    }

    public function deleteBooking($id) {
        $booking = Order::find($id);
        $payment = Payment::where('order_id', $booking->id)->first();
        $orderDetails = OrderDetail::where('order_id', $booking->id)->get();

        foreach ($orderDetails as $orderDetail) {
            $orderDetail->delete();
        }
        $payment->delete();
        $booking->delete();

        return redirect('/manage/booking')->with('message', 'Booking Info Deleted!');
    }
}

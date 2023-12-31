<div style="font-family: Arial, sans-serif; background-color: #f4f4f4;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <div style="background-color: #fff; padding: 20px; border-radius: 4px;">

            <h3 style="text-align: center; color: #333; margin-bottom: 20px;">
                @if ($memberTransaction->status === 'paid')
                    INVOICE
                @else
                    REFUND INVOICE
                @endif
            </h3>

            <div style="margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between;">
                    <div style="flex-grow: 1;">
                        <p style="font-size: 14px; color: #777; margin-bottom: 5px;">Address</p>
                        <p style="font-size: 14px; color: #777; margin-bottom: 5px;">Riyadh, Saudi Arabia</p>
                        <p style="font-size: 14px; color: #777; margin-bottom: 0;"><span>Zip-code:</span> 1222</p>
                    </div>
                    <div style="flex-shrink: 0;">
                        <h6 style="font-size: 14px; margin-bottom: 5px;">Legal Registration No:</h6>
                        <p style="font-size: 14px; color: #777; margin-bottom: 5px;">987654</p>
                        <h6 style="font-size: 14px; margin-bottom: 5px;">Email:</h6>
                        <p style="font-size: 14px; color: #777; margin-bottom: 5px;">support@RDS.com</p>
                        <h6 style="font-size: 14px; margin-bottom: 5px;">Website:</h6>
                        <p style="font-size: 14px; color: #007bff; margin-bottom: 0;">
                            <a href="https://www.RDS.com/"
                                style="color: #007bff; text-decoration: none;">www.RDS.com</a>
                        </p>
                    </div>
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between;">
                    <div style="flex-grow: 1;">
                        <p style="font-size: 14px; color: #777; margin-bottom: 5px;">Client Name</p>
                        <h5 style="font-size: 14px; margin-bottom: 0;">{{ $memberTransaction->member->english_name }}
                        </h5>
                    </div>
                    <div style="flex-shrink: 0;">
                        <p style="font-size: 14px; color: #777; margin-bottom: 5px;">Date</p>
                        <h5 style="font-size: 14px; margin-bottom: 0;">
                            <span
                                style="font-weight: bold;">{{ $memberTransaction->created_at->format('Y-m-d') }}</span>
                            <span style="font-size: 12px; color: #777;">
                                {{ $memberTransaction->created_at->format('h:iA') }}
                            </span>
                        </h5>
                    </div>
                    <div style="flex-shrink: 0;">
                        <p style="font-size: 14px; color: #777; margin-bottom: 5px;">Invoice Status</p>
                        <span
                            style="font-size: 11px; font-weight: bold; color: #fff; background-color: #28a745; padding: 5px 10px; border-radius: 4px;">
                            {{ App\Models\MemberTransaction::PAYMENT_STATUS_SELECT[$memberTransaction->status] ?? '' }}
                        </span>
                    </div>
                    <div style="flex-shrink: 0;">
                        <p style="font-size: 14px; color: #777; margin-bottom: 5px;">Total Amount</p>
                        <h5 style="font-size: 14px; margin-bottom: 0;">
                            SAR<span>{{ $memberTransaction->amount_after_vat }}</span></h5>
                    </div>
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between;">
                    <div style="flex-grow: 1;">
                        <p style="font-size: 14px; color: #777; margin-bottom: 5px;">Invoice No</p>
                        <h5 style="font-size: 14px; margin-bottom: 0;">#MV<span>{{ $memberTransaction->id }}</span></h5>
                    </div>
                </div>
            </div>

            <div>
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #f2f2f2;">
                            <th style="padding: 10px; text-align: left;">#</th>
                            <th style="padding: 10px; text-align: left;">Product Details</th>
                            <th style="padding: 10px; text-align: left;">Price</th>
                            <th style="padding: 10px; text-align: left;">Discount</th>
                            <th style="padding: 10px; text-align: left;">Price After Discount</th>
                            <th style="padding: 10px; text-align: left;">VAT</th>
                            <th style="padding: 10px; text-align: right;">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 10px; text-align: left;">01</td>
                            <td style="padding: 10px; text-align: left;">
                                <span style="font-weight: bold;">{{ $memberTransaction->product->english_name }}</span>
                            </td>
                            <td style="padding: 10px; text-align: left;">
                                {{ $memberTransaction->amount + $memberTransaction->discount }}</td>
                            <td style="padding: 10px; text-align: left;">{{ $memberTransaction->discount }}</td>
                            <td style="padding: 10px; text-align: left;">{{ $memberTransaction->amount }}</td>
                            <td style="padding: 10px; text-align: left;">{{ $memberTransaction->vat }}</td>
                            <td style="padding: 10px; text-align: right;">{{ $memberTransaction->amount_after_vat }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>



            <div style="margin-top: 20px;">
                <div class="alert alert-info" style="padding: 10px; border-radius: 4px;">
                    <p style="font-size: 14px; margin-bottom: 0;">
                        <span style="font-weight: bold;">NOTES:</span>
                        <span>All subscriptions can be cancelled within 2 days from the start date of the
                            subscription</span>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

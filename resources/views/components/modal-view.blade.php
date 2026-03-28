<!-- Modal -->
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">&nbsp;</h4>
                <button type="button" class="btn-close" data-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="area-download-photo">
                <div class="row">
                    <div class="testimonial-4__wrapper col-md-8 m-auto">
                        <div align="center" class="m-auto" >
                            <img src="{{ asset('assets') }}/imgs/foto_agent.png" width="300" alt="">
                        </div>
                                                            
                        <div class="team-details__content text-center">
                            <h3 id="agent_name_modal" class="team-details__name text-black">LILIYANA</h3>
                            <span class="team-details__author__position text-black">GREAT ACHIEVERS</span>
                            <div class="text-black m-auto mt-5"> Agency of the Year 2025<br>
                                Top Leader Builder 2024<br>
                                Million Dollar Round Table<br>
                                The President's Club - Leader<br>
                                President's Cabinet's Club - Leader<br>
                                Star Club - Producer
                            </div>
                        </div>
                    </div>
                </div>
                                        
                <div class="m-auto">
                    <div class="mb-2 text-black" align="center">Selamat atas pencapaian Anda, <br>Great Achievers Prudential Indonesia di 2025!</div>
                    <div align="center">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ 'ganti-dg-url-agent' }}" target="_new"><img src="{{ asset('assets') }}/imgs/s-fb.png" width="120" alt=""/></a>
                        <a href="https://twitter.com/intent/tweet?&url={{ 'ganti-dg-url-agent' }}" target="_new"><img src="{{ asset('assets') }}/imgs/s-tw.png" width="120" alt=""/></a>
                        <a href="whatsapp://send?text=Coba%20cek%20laman%20Prudential%20Achiever%20ini!%20{{ 'ganti-dg-url-agent' }}" target="_new"><img src="{{ asset('assets') }}/imgs/s-wa.png" width="120" alt=""/></a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&?&url={{ 'ganti-dg-url-agent' }}" target="_new"><img src="{{ asset('assets') }}/imgs/s-linkedin.png" width="120" alt=""/></a>
                            
                        <div class="mt-2">   
                            or link <form action="#" class="rr-subscribe-form cari form-check-inline">
                                <input id="url-agent-link" type="text" class="form-control text-center" value="https://www.prudential.co.id/id/">
                            </form>&nbsp;&nbsp;
                            <img onclick="myCopyFunction('url-agent-link');" src="{{ asset('assets') }}/imgs/b_copylink.png" width="120" alt="" style="cursor: pointer;" />&nbsp;
                            <img id="download-photo" onClick="dowloadImage('download-photo');" src="{{ asset('assets') }}/imgs/b_download.png" width="120" alt="" style="cursor: pointer;" />
                        </div>
                                        
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>    
<!-- Modal -->
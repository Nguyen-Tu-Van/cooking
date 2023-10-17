import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import './style/summernote.min';
import './style/learning_detailed';

function Repply({handleRepply,room_chat_id}) {
    const handleSend = async () =>
    {
        if(room_chat_id>0)
        {
            async function createComment()
            {
                const response = await axios.put('/api/room-comment/',{
                    data : {
                        content : document.getElementById("contentInput").value,
                        user_id : document.getElementById("user_id").value,
                        employee_id : null,
                        room_chat_id : room_chat_id
                    }
                });
                console.log(await response);

                document.getElementById("contentInput").value = "";
                if(response.status==200){
                    socket.emit("client-send-comment",{message:true,room_chat_id : room_chat_id});
                    handleRepply(0);
                    new Noty({
                        text: 'Thành công',
                        type: 'success'
                    }).show();
                }
                else{
                    new Noty({
                        text: 'Thất bại',
                        type: 'danger'
                    }).show();
                }
            } 
            createComment();
        }
        else{
            async function createChat()
            {
                const response = await axios.put('/api/room-chat/',{
                    data : {
                        content : document.getElementById("contentInput").value,
                        user_id : document.getElementById("user_id").value,
                        employee_id : null,
                        classes_id : document.getElementById("classes_id").value
                    }
                });
                document.getElementById("contentInput").value = "";
                if(response.status==200){
                    socket.emit("client-send-chat",{message:true})
                    new Noty({
                        text: 'Đã đăng',
                        type: 'success'
                    }).show();
                }
                else{
                    new Noty({
                        text: 'Thất bại',
                        type: 'danger'
                    }).show();
                }
            } 
            createChat();
        }
    } 
    return (
        <div id="repply">
            <div className="mb-1">
            <textarea rows="3" cols="3" className="form-control" placeholder="Nhập mô tả" name="content" id="contentInput"></textarea>
            {/* <textarea rows="3" cols="3" className="form-control summernote" placeholder="Nhập mô tả" name="content" id="contentInput"></textarea> */}
            </div>
            <div className="text-center">
                <button type="button" className="btn btn-light mr-1" onClick={()=>handleRepply(0)}><i className="icon-cross2 mr-1"></i> Close</button>
                <button type="button" className="btn btn-primary" onClick={()=>handleSend()}><i className="icon-arrow-right14 mr-1"></i> Send</button>
            </div>
        </div>
    );
}

export default Repply;


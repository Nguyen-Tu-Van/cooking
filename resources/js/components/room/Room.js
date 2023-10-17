import React, { createContext, useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import "./style/Room.scss";
import Repply from './Repply';
import Chat from './Chat';
import { v4 as uuidv4, v6 as uuidv6 } from 'uuid';

function Room() {
    const [roomChat,setRoomChat] = useState([]);
    const [comment,setComment] = useState(-1);
    const handleRepply = (id) => {
        setComment(id);
        setTimeout(function () {
            if(id==-1)
            {
                let objDiv = document.getElementById("chat_scroll");
                objDiv.scrollTop = objDiv.scrollHeight+100;
            }
        },1)
    }
    
    useEffect(() =>{
        var socket = io("http://localhost:3456");
        socket.on("server-send-chat",function(data) {
            if(data.message)
            {
                getDataRoomChat();
            }
        })
        async function getDataRoomChat()
        {
            let id = document.getElementById('classes_id').value;
            let response = await axios.get('/api/room-chat/'+id);
            setRoomChat(await response.data);
        }
        getDataRoomChat();
    },[])
    return (
        <div>
            <div className="conatiner p-2">
                {roomChat.map(chat => (
                <div className="row" key={uuidv4()}>
                    <Chat chat={chat} handleRepply={handleRepply} comment={comment}/>
                </div>
                ))}
            </div>
            {   comment == -1 &&
                <Repply handleRepply={handleRepply}/>
            }

            {   comment != -1 &&
                <div className="position-fixed" style={{bottom:0,padding:"5px"}}>
                    <button type="button" className="btn btn-indigo p-1" onClick={()=>handleRepply(-1)}><i className="icon-pencil5 mr-1"></i> Cuộc hội thoại mới</button>
                </div>
            }
        </div>
    );
}

export default Room;

if (document.getElementById('content')) {
    ReactDOM.render(<Room />, document.getElementById('content'));
}

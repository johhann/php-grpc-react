import React, { useState } from 'react';
import { PingServiceClient } from './proto/ping_grpc_web_pb';
// import { MessageServiceClient } from './proto/message_grpc_web_pb';
// import { MessageRequest } from './proto/message_pb';
import { PingRequest } from './proto/ping_pb';

// const client = new PingServiceClient('http://localhost:50051'); // Envoy port
const client = new PingServiceClient('http://localhost:8080'); // Envoy port

function App() {
  const [input, setInput] = useState('');
  const [response, setResponse] = useState('');

  const handleClick = () => {
    const request = new PingRequest({});
    // request.setMessage(input);

    request.setMessage('hello');
    client.ping(request, {}, (err, res) => {
      if (err) {
        console.error(err);
        setResponse('Error: ' + err.message);
      } else {
        console.log({result: res.getMessage()});
        setResponse(res.getMessage());
      }
    });
  };

  return (
    <div style={{ padding: '2rem' }}>
      <h1>gRPC-Web Client</h1>
      <input
        value={input}
        onChange={(e) => setInput(e.target.value)}
        placeholder="Enter message..."
      />
      <button onClick={handleClick}>Send</button>
      <p><strong>Response:</strong> {response}</p>
    </div>
  );
}

export default App;

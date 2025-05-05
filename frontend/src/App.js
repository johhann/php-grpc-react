import React, { useState } from 'react';

function App() {
  const [input, setInput] = useState('');
  const [response, setResponse] = useState('');

  const handleClick = async () => {
    try {
      const res = await fetch('http://localhost:8080/ping', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ message: input }),
      });

      const data = await res.json();
      setResponse(data.message || 'No message returned');
    } catch (error) {
      setResponse('Error: ' + error.message);
    }
  };

  return (
    <div style={{ padding: '2rem' }}>
      <h1>gRPC Client</h1>
      <input
        type="text"
        placeholder="Enter message..."
        value={input}
        onChange={(e) => setInput(e.target.value)}
        style={{ padding: '0.5rem', width: '300px' }}
      />
      <button onClick={handleClick} style={{ marginLeft: '1rem', padding: '0.5rem' }}>
        Send
      </button>
      <p style={{ marginTop: '2rem' }}>
        <strong>Response:</strong> {response}
      </p>
    </div>
  );
}

export default App;

import React from 'react';
import { render, screen, fireEvent, waitFor } from '@testing-library/react';
import App from './App';

beforeEach(() => {
  fetch.resetMocks();
});

test('sends input to backend and displays response', async () => {
  fetch.mockResponseOnce(JSON.stringify({ message: 'Pong!' }));

  render(<App />);

  const input = screen.getByPlaceholderText(/enter message/i);
  const button = screen.getByText(/send/i);

  fireEvent.change(input, { target: { value: 'Ping' } });
  fireEvent.click(button);

  await waitFor(() =>
    expect(screen.getByText(/response:/i)).toHaveTextContent('Pong!')
  );

  expect(fetch).toHaveBeenCalledWith('http://localhost:8080/ping', expect.objectContaining({
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ message: 'Ping' }),
  }));
});

test('displays error message on fetch failure', async () => {
  fetch.mockRejectOnce(new Error('Network error'));

  render(<App />);
  fireEvent.click(screen.getByText(/send/i));

  await waitFor(() =>
    expect(screen.getByText(/response:/i)).toHaveTextContent(/error: network error/i)
  );
});

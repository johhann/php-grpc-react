# gRPC Ping Application with PHP and React
---
This project implements a gRPC-based application with a PHP backend (using Spiral PHP gRPC) and a React frontend. The backend provides a PingService with a Ping method that receives a string and returns it. The frontend allows users to input a string, send it to the backend, and display the returned string.

---
## Prerequisites

- Docker and Docker Compose
- Protocol Buffers compiler (protoc)
- `protoc-gen-php-grpc` (installed as per instructions)
- `protoc-gen-grpc-web` (for frontend gRPC code generation)

## Setup
- Build and Run with Docker - `docker-compose up --build`
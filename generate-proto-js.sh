#!/bin/bash

PROTO_DIR=./proto
OUT_DIR=./frontend/src/proto

mkdir -p $OUT_DIR

# Generate JS + gRPC-Web stubs for each proto file
for file in "$PROTO_DIR"/*.proto; do
  echo "🔄 Generating JS classes from: $file"
  
  npx protoc \
    -I="$PROTO_DIR" "$file" \
    --js_out=import_style=commonjs:"$OUT_DIR" \
    --grpc-web_out=import_style=commonjs,mode=grpcwebtext:"$OUT_DIR"
  
  if [ $? -ne 0 ]; then
    echo "❌ Failed to generate files for $file"
    exit 1
  fi
done

echo "✅ JS gRPC-Web files generated successfully."
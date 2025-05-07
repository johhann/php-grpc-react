FROM node:18

WORKDIR /app

# Copy package files and install dependencies
COPY ./package*.json ./
RUN npm install

# Install required proto runtime deps
RUN npm install google-protobuf grpc-web --save

# Copy app source code
COPY . .

EXPOSE 3000

CMD ["npm", "start"]
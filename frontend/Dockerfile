FROM node:22-alpine

WORKDIR /app

# копируем package.json отдельно (оптимизация кеша)
COPY package*.json ./

# устанавливаем зависимости
RUN npm install

# копируем весь проект
COPY . .

# vite порт
EXPOSE 5173

# запуск dev сервера
CMD ["npm", "run", "dev", "--", "--host"]
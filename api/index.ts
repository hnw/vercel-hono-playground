import { Hono } from 'hono'
import { handle } from 'hono/vercel'
import { oidcAuthMiddleware, getAuth, revokeSession, processOAuthCallback } from "/Users/hanawa-y/src/github.com/hnw/middleware/packages/oidc-auth/src";

export const config = {
  runtime: 'edge'
}

const app = new Hono().basePath('/api')

app.get('/logout', async (c) => {
  await revokeSession(c)
  return c.text(`Logged off`)
})
app.get('/callback', async (c) => {
  return processOAuthCallback(c)
})
app.use('/*', oidcAuthMiddleware())
app.get('/', (c) => {
  return c.json({ message: 'Hello Hono!!' })
})

export default handle(app)

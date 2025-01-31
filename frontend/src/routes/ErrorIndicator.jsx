export default function ErrorIndicator() {
  return (
    <div
      style={{
        display: 'flex',
        justifyContent: 'center',
        alignItems: 'center',
        height: '100vh',
      }}
    >
      <p
        style={{
          fontSize: '2rem',
          fontWeight: 'bold',
          color: 'red',
        }}
      >
        Failed to load content
      </p>
    </div>
  );
}
